<?php

namespace App\Http\Livewire;

use App\Models\Etapa;
use Livewire\Component;

class EtapaController extends Component
{
    public $nombre = '';
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
            'name' => $this->nombre
        ]);
        $this->reset('nombre');
    }

    public function editar($id)
    {
        $this->accion = 3;
        $datos = Etapa::find($id);
        $this->etapa_id = $datos->id;
        $this->nombre = $datos->name;
    }

    public function actualizar()
    {
        $datos = Etapa::find($this->etapa_id);
        $datos->update([
            'name' => $this->nombre,
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
