<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['name', 'apellidos', 'dni', 'rut', 'direccion', 'telefono', 'celular', 'email'];
    use HasFactory;
}
