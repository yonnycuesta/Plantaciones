<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injertacion extends Model
{
    protected $fillable = ['fechaInjertacion', 'fechaEstimada', 'observacion', 'estanteria_id', 'tamano_id', 'etapa_id'];
    use HasFactory;

    /**
     * Obtener el tamaño asociado con la injertacion.
     * uno a uno
     */
    public function tamano()
    {
        return $this->hasOne(Tamano::class, 'id', 'tamano_id');
    }
    /**
     * Obtener la estanteria asociada con la injertacion.
     * uno a uno
     */
    public function estanteria()
    {
        return $this->hasOne(Estanteria::class);
    }

    /**
     * Obtener las etapas pertenecientes a la injertacion.
     * uno a muchos
     */
    public function etapas()
    {
        return $this->hasMany(Etapa::class);
    }
}
