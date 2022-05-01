<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use League\Flysystem\Plugin\GetWithMetadata;
use Livewire\Component;

class PedidoController extends Component
{
    public $id_cliente, $id_pedido, $id_producto, $telefono, $dni;

    public $cantidad, $codigo, $precio, $cantidad_demandada, $precio_total, $cantidad_stock;

    public $name_producto, $query, $queryId;
    public $data, $myArray = [];
    public $accion = 1;
    public $total = 0;


    protected $listeners = ['orderDetails' => 'detallePedido'];

    public function detallePedido()
    {
        dd('detallePedido');
    }
    public function render()
    {
        $clientes = Cliente::all();

        $pedidos = Pedido::all();


        if ($this->id_cliente) {
            $data = Cliente::find($this->id_cliente);
            $this->telefono = $data->telefono;
            $this->dni = $data->dni;
        }
        if (!is_null($this->codigo)) {
            $this->query = Producto::select()->where('product_codigo', $this->codigo)->first();

            if (!is_null($this->query)) {
                $this->name_producto = $this->query->name;
                $this->precio = $this->query->precio_unitario;
                $this->precio_total = $this->cantidad * $this->precio;
                $this->cantidad_demandada = $this->query->cantidad_demandada;
            } else {
                $this->reset(['precio', 'precio_total', 'name_producto']);
            }
        }

        return view('livewire.pedido-controller', compact('pedidos', 'clientes'));
    }


    public function add()
    {
        $this->query = Producto::select()->where('product_codigo', $this->codigo)->first();

        $this->precio = $this->query->precio_unitario;
        $this->precio_total = $this->cantidad * $this->precio;
        $this->name_producto = $this->query->name;
        $this->id_producto = $this->query->id;


        $this->data  = array(
            'codigo' => $this->codigo,
            'name_producto' => $this->name_producto,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'precio_total' => $this->precio_total,
        );



        array_push($this->myArray, $this->data);


        // Calcular el total
        foreach ($this->myArray as $my) {
            $this->total += $my['precio_total'];
        }
    }

    public function eliminar()
    {

        foreach ($this->myArray as $key => $value) {
            if ($value['codigo'] == $this->codigo) {
                unset($this->myArray[$key]);
            }
        }
        $this->reset(['codigo', 'cantidad', 'precio', 'precio_total', 'name_producto']);
    }

    public function guardarPedido()
    {

        $this->query = Producto::select()->where('product_codigo', $this->codigo)->first();

        $this->name_producto = $this->query->name;
        $this->id_producto = $this->query->id;


        $this->fechaPedido = date('Y-m-d');

        Pedido::create([
            'cliente_id' => $this->id_cliente,
            'total' => $this->total,
            'fecha_pedido' => $this->fechaPedido,
        ]);




        $this->id_pedido = Pedido::latest('id')->value('id');

        DetallePedido::create([
            'pedido_id' => $this->id_pedido,
            'producto_id' => $this->id_producto,
            'nombre_producto' => $this->name_producto,
            'cantidad' => intval($this->cantidad),
            'precio' => $this->precio,
            'subtotal' => $this->total
        ]);
        $this->emit('pedidoGuardado');

        $this->reset(['codigo', 'cantidad', 'precio', 'precio_total', 'name_producto', 'id_cliente', 'total', 'dni', 'telefono']);
        $this->myArray = [];
    }
}
