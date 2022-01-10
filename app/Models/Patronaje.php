<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patronaje extends Model
{
    protected $fillable = ['fechaPatronaje', 'fechaEstimada', 'observacion', 'cantidad', 'estanteria_id', 'tamano_id', 'etapa_id'];

    use HasFactory;


    /**
     * Obtener el tamaño asociado con el patronaje.
     * uno a uno
     */
    public function tamano()
    {
        return $this->hasOne(Tamano::class);
    }
    /**
     * Obtener la estanteria asociada con el patronaje.
     * uno a uno
     */
    public function estanteria()
    {
        return $this->hasOne(Estanteria::class);
    }

     /**
     * Obtener las etapas pertenecientes al patronaje.
     * uno a muchos
     */
    public function etapas()
    {
        return $this->hasMany(Etapa::class);
    }

}
