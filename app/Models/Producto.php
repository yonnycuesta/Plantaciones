<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['name', 'tamano_id', 'etapa_id', 'stock', 'product_codigo', 'cantidad_demandada', 'precio_unitario', 'imagen', 'descripcion'];
    use HasFactory;
}
