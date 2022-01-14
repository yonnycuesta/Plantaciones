<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injertacion extends Model
{
    protected $fillable = ['fechaInjertacion', 'fechaEstimada', 'observacion','cantidad', 'estanteria_id', 'tamano_id', 'etapa_id'];

    //protected $primaryKey = 'injertacions_id';
    use HasFactory;

    /**
     * Obtener el tamaño asociado con la injertacion.
     * uno a uno
     */
    public function tamano()
    {
        return $this->hasOne(Tamano::class);
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
