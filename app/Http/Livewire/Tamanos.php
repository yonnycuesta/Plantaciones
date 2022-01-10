<?php

namespace App\Http\Livewire;

use App\Models\Tamano;
use Livewire\Component;

class Tamanos extends Component
{
    public $nombre = '';
    public $tamano_id;
    public $accion = 1;

    public function render()
    {
        $tamanos = Tamano::all();
        return view('livewire.tamanos', compact('tamanos'));
    }

    public function store()
    {

        Tamano::create([
            'name' => $this->nombre
        ]);
        $this->reset('nombre');
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
        return view('livewire.tamanos');
    }

    public function eliminar($id){
        if($id){
            Tamano::where('id', $id)->delete();
        }
        return view('livewire.tamanos');
    }
}
