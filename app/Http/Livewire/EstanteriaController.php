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

        Estanteria::create([
            'name' => $this->nombre
        ]);
        $this->reset('nombre');
    }



    public function editar($id)
    {
        $datos = Estanteria::find($id);
        $this->nombre = $datos->name;
    }

    public function actualizar(Estanteria $estanteria)
    {
        dd($estanteria);
        $datos = Estanteria::find($estanteria->id);

        $datos->update([

            'name' => $this->nombre,

        ]);
    }
}
