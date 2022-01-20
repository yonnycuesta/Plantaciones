<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre, $direccion, $telefono, $celular, $apellidos, $rut, $dni, $email, $cliente_id;
    public $accion = 1;

    public function render()
    {
        $clientes = Cliente::paginate(10);
        return view('livewire.cliente-controller', compact('clientes'));
    }

    public function store()
    {
        Cliente::create([
            'name' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'apellidos' => $this->apellidos,
            'rut' => $this->rut,
            'dni' => $this->dni,
            'email' => $this->email,
        ]);
        $this->reset(['nombre', 'direccion', 'telefono', 'celular', 'apellidos', 'rut', 'dni', 'email']);
        Toastr::success('Datos Guardado Exitosamente!');
    }
    public function editar($id)
    {
        $this->accion = 3;
        $datos = Cliente::find($id);
        $this->cliente_id = $datos->id;
        $this->nombre = $datos->name;
        $this->direccion = $datos->direccion;
        $this->telefono = $datos->telefono;
        $this->celular = $datos->celular;
        $this->apellidos = $datos->apellidos;
        $this->rut = $datos->rut;
        $this->dni = $datos->dni;
        $this->email = $datos->email;
    }

    public function actualizar()
    {
        $datos = Cliente::find($this->cliente_id);
        $datos->update([
            'name' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'apellidos' => $this->apellidos,
            'rut' => $this->rut,
            'dni' => $this->dni,
            'email' => $this->email,
        ]);
        $this->accion = 1;
        $this->reset(['nombre', 'direccion', 'telefono', 'celular', 'apellidos', 'rut', 'dni', 'email']);
        Toastr::success('Datos Actualizado Exitosamente!');
        return view('livewire.cliente-controller');
    }
    public function eliminar($id)
    {
        $datos = Cliente::find($id);
        $datos->delete();
        Toastr::success('Datos Eliminado Exitosamente!');
        return view('livewire.cliente-controller');
    }
}
