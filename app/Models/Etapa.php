<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $fillable = ['name'];
    use HasFactory;


    /**
     * Obtener la injertacion perteneciente a la etapa.
     * uno a muchos
     */
    public function injertacion()
    {
        return $this->belongsTo(Injertacion::class);
    }

    /**
     * Obtener el patronaje perteneciente a la etapa.
     * uno a muchos
     */
    public function patronaje()
    {
        return $this->belongsTo(Patronaje::class);
    }
}
