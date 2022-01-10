<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use Livewire\Component;


class EstanteriaController extends Component
{


    public $nombre = '';


    public function render()

    {
        $Estanteria = Estanteria::all();
        return view('livewire.estanteria-controller', compact('Estanteria'));
    }

    public function store()
    {
        $this->validate(['nombre' => 'min:2|max:10|required|']);
        Estanteria::create([
            'name' => $this->nombre
        ]);
        $this->reset('nombre');
        session()->flash('status', 'estanteria guardada  con exito :)');
    }



    public function editar($id)
    {
        $datos = Estanteria::find($id);
        $this->nombre = $datos->name;
    }

    public function actualizar($id)
    {

        $datos = Estanteria::find($id);

        $datos->update([

            'name' => $this->nombre,

        ]);
    }



    public function destroy($id)
    {

        $datos = Estanteria::find($id);

        $datos->delete();
        session()->flash('error', 'Cliente eliminado :)');
    }


    protected  $listeners = [
        'deleteRow' => 'destroy'
    ];
}
