<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    
    protected $fillable = ['pedido_id', 'producto_id', 'nombre_producto', 'cantidad', 'precio', 'subtotal'];
    use HasFactory;
}
