<?php

namespace App\Http\Livewire;

use App\Models\Tamano;
use Livewire\Component;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;

class Tamanos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre = '';
    public $tamano_id, $accion = 1;


    public function render()
    {
        $tamanos = Tamano::paginate(10);
        return view('livewire.tamanos', compact('tamanos'));
    }

    public function store()
    {

        Tamano::create([
            'name' => $this->nombre
        ]);
        $this->reset('nombre');
        Toastr::success('Datos Guardado Exitosamente!');
    }

    public function editar($id)
    {
        $this->accion = 3;
        $datos = Tamano::find($id);
        $this->tamano_id = $datos->id;
        $this->nombre = $datos->name;
    }

    public function actualizar()
    {
        $datos = Tamano::find($this->tamano_id);
        $datos->update([
            'name' => $this->nombre,
        ]);
        $this->accion = 1;
        Toastr::success('Datos Actualizado Exitosamente!');
    }

    public function destroy($id)
    {
        $datos = Tamano::find($id);
        $datos->delete();
        Toastr::error('Tamaño Eliminado Exitosamente!');
    }

    protected  $listeners = [
        'deleteRow' => 'destroy'
    ];
}
