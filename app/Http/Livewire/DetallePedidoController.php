<?php

namespace App\Http\Livewire;

use App\Models\DetallePedido;

use Livewire\Component;

class DetallePedidoController extends Component
{

    public $id_pedido;


    public function render()
    {


        $detallePedido = DetallePedido::join('pedidos as p', 'p.id', 'detalle_pedidos.pedido_id')
            ->join('productos as pro', 'pro.id', 'detalle_pedidos.producto_id')
            ->select('detalle_pedidos.*', 'p.id as pedido_id', 'pro.name as producto_name', 'cantidad')
            ->get();


        return view('livewire.detalle-pedido-controller', compact('detallePedido'));
    }
}
