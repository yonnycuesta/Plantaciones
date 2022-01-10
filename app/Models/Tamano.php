<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
    protected $fillable = ['name'];
    use HasFactory;


    /**
     * Obtener el patronaje perteneciente al tamaño.
     * uno a uno
     */
    public function patronaje()
    {
        return $this->belongsTo(Patronaje::class, 'tamano_id', 'id');
    }
    /**
     * Obtener la injertacion perteneciente al tamaño.
     * uno a uno
     */
    public function injertacion()
    {
        return $this->belongsTo(Injertacion::class);
    }
}
