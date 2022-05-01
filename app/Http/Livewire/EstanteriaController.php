<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use Livewire\Component;
use Livewire\WithPagination;
use Brian2694\Toastr\Facades\Toastr;

class EstanteriaController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $nombre = '';
    public $accion = 1;

    public $estanteria_id, $table_search;

    public function render()

    {
        //$Estanteria = Estanteria::paginate(10);
        return view('livewire.estanteria-controller', [
            'Estanteria' => Estanteria::when($this->table_search, function ($query, $table_search) {
                return $query->where('name', 'like', "%$table_search%");
            })->paginate(10)

        ]);
    }

    public function limpiarCampos()
    {

        $this->reset(['nombre']);
    }


    public function store()
    {
        $this->validate(['nombre' => 'min:2|max:10|required|']);
        Estanteria::create([
            'name' => $this->nombre
        ]);
        $this->limpiarCampos();
        Toastr::success('Datos Guardado Exitosamente!');
    }



    public function editar($id)
    {
        $this->accion = 3;
        $datos = Estanteria::find($id);
        $this->estanteria_id = $datos->id;
        $this->nombre = $datos->name;
    }

    public function actualizar()
    {

        $datos = Estanteria::find($this->estanteria_id);
        $datos->update([

            'name' => $this->nombre,
        ]);
        $this->accion = 1;
        $this->limpiarCampos();
        Toastr::success('Datos Actualizado Exitosamente!');
    }



    public function destroy($id)
    {

        $datos = Estanteria::find($id);

        $datos->delete();
        Toastr::error('Estanteria Eliminada Exitosamente!');
    }


    protected  $listeners = [
        'deleteRow' => 'destroy'
    ];


    public function inactivar($id)
    {
        $datos = Estanteria::find($id);
        $this->estanteria_id = $datos->id;
        $datos->update([
            'status' => 'busy'
        ]);
        Toastr::success('Estanteria Inhabilitada Exitosamente!');
    }

    public function activar($id)
    {
        $datos = Estanteria::find($id);
        $this->estanteria_id = $datos->id;
        $datos->update([
            'status' => 'available'
        ]);
        Toastr::success('Estanteria habilitada Exitosamente!');
    }
}
