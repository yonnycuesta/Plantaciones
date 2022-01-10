<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estanteria extends Model
{
    protected $fillable = ['name', 'status'];
    use HasFactory;

     /**
     * Obtener el patronaje perteneciente a la estanteria.
     * uno a uno
     */
    public function patronaje()
    {
        return $this->belongsTo(Patronaje::class);
    }
    /**
     * Obtener la injertacion perteneciente a la estanteria.
     * uno a uno
     */
    public function injertacion()
    {
        return $this->belongsTo(Injertacion::class);
    }
}
