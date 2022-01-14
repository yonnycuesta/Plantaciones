<?php

namespace App\Http\Livewire;

use App\Models\Etapa;
use Livewire\Component;

class EtapaController extends Component
{
    public $nombre, $duracionestimada;
    public $etapa_id;
    public $accion = 1;

    public function render()
    {
        $etapas = Etapa::all();
        return view('livewire.etapa-controller', compact('etapas'));
    }

    public function store()
    {

        Etapa::create([
            'name' => $this->nombre,
            'duracionEstimada' => $this->duracionestimada
        ]);
        $this->reset('nombre', 'duracionestimada');
    }

    public function editar($id)
    {
        $this->accion = 3;
        $datos = Etapa::find($id);
        $this->etapa_id = $datos->id;
        $this->nombre = $datos->name;
        $this->duracionestimada = $datos->duracionEstimada;
    }

    public function actualizar()
    {
        $datos = Etapa::find($this->etapa_id);
        $datos->update([
            'name' => $this->nombre,
            'duracionEstimada' => $this->duracionestimada
        ]);
        $this->accion = 1;
        return view('livewire.etapa-controller');
    }

    public function destroy($id)
    {
        $datos = Etapa::find($id);
        $datos->delete();
        session()->flash('error', 'Etapa eliminada :)');
    }
    protected  $listeners = [
        'deleteRow' => 'destroy'
    ];
}
