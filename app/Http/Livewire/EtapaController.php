<?php

namespace App\Http\Livewire;

use App\Models\Etapa;
use Livewire\Component;
use Livewire\WithPagination;

use Brian2694\Toastr\Facades\Toastr;

class EtapaController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre, $duracionestimada, $etapamaestra, $etapa_id;

    public $accion = 1;

    public function render()
    {
        $etapas = Etapa::paginate(10);
        return view('livewire.etapa-controller', compact('etapas'));
    }

    public function store()
    {

        Etapa::create([
            'name' => $this->nombre,
            'duracionEstimada' => $this->duracionestimada,
            'etapa_maestra' => $this->etapamaestra
        ]);
        Toastr::success('Datos Guardado Exitosamente!');
        $this->reset('nombre', 'duracionestimada');
    }

    public function editar($id)
    {
        $this->accion = 3;
        $datos = Etapa::find($id);
        $this->etapa_id = $datos->id;
        $this->nombre = $datos->name;
        $this->duracionestimada = $datos->duracionEstimada;
        $this->etapamaestra = $datos->etapamaestra;
    }

    public function actualizar()
    {
        $datos = Etapa::find($this->etapa_id);
        $datos->update([
            'name' => $this->nombre,
            'duracionEstimada' => $this->duracionestimada,
            'etapa_maestra' => $this->etapamaestra
        ]);
        $this->accion = 1;
        Toastr::success('Datos Actualizado Exitosamente!');
        return view('livewire.etapa-controller');

    }

    public function destroy($id)
    {
        $datos = Etapa::find($id);
        $datos->delete();
        Toastr::error('Etapa Eliminada Exitosamente!');
    }
    protected  $listeners = [
        'deleteRow' => 'destroy'
    ];


}
