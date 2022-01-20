<?php

namespace App\Http\Livewire;

use App\Models\Etapa;
use App\Models\Producto;
use App\Models\Tamano;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoController extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $datosTamano, $datosEtapa, $nombre, $stock, $descripcion, $precio_unitario, $imagen, $cantidad_demandada;

    public $accion = 1;
    public $id_tamano, $id_etapa;

    public function render()
    {
        $this->datosTamano = Tamano::all();
        $this->datosEtapa = Etapa::all();

        $productos = Producto::paginate(10);
        return view('livewire.producto-controller', compact('productos'));
    }

    public function store()
    {

        Producto::create([
            'name' => $this->nombre,
            'tamano_id' => $this->id_tamano,
            'etapa_id' => $this->id_etapa,
            'stock' => $this->stock,
            'cantidad_demandada' => $this->cantidad_demandada,
            'precio_unitario' => $this->precio_unitario,
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
        ]);
        $this->accion = 1;
        $this->reset(['nombre', 'stock', 'descripcion', 'precio_unitario', 'id_etapa', 'imagen', 'cantidad_demandada']);
        Toastr::success('Datos Guardado Exitosamente!');
    }

    public function editar($id)
    {
        $this->accion = 3;
        $datos = Producto::find($id);
        $this->producto_id = $datos->id;
        $this->id_tamano = $datos->tamano_id;
        $this->id_etapa = $datos->etapa_id;
        $this->nombre = $datos->name;
        $this->stock = $datos->stock;
        $this->descripcion = $datos->descripcion;
        $this->precio_unitario = $datos->precio_unitario;
        $this->imagen = $datos->imagen;
        $this->cantidad_demandada = $datos->cantidad_demandada;
    }
    public function actualizar()
    {
        $datos = Producto::find($this->producto_id);
        $datos->update([
            'name' => $this->nombre,
            'tamano_id' => $this->id_tamano,
            'etapa_id' => $this->id_etapa,
            'stock' => $this->stock,
            'cantidad_demandada' => $this->cantidad_demandada,
            'precio_unitario' => $this->precio_unitario,
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
        ]);
        $this->accion = 1;
        $this->reset(['nombre', 'stock', 'descripcion', 'id_tamano', 'id_etapa', 'precio_unitario', 'imagen', 'cantidad_demandada']);
        Toastr::success('Datos Actualizado Exitosamente!');
        return view('livewire.producto-controller');
    }
    public function eliminar($id)
    {
        $datos = Producto::find($id);
        $datos->delete();
        Toastr::success('Datos Eliminado Exitosamente!');
    }
}
