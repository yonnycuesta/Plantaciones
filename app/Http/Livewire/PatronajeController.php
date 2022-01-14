<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use App\Models\Etapa;
use App\Models\Patronaje;
use App\Models\Tamano;
use Livewire\Component;

class PatronajeController extends Component
{ public $fechaestimada, $observacion, $id_etapa,
    $id_tamano, $id_estanteria, $datosTamano, $datosEtapa, $datosEstanteria, $cantidad;

public $id_patronaje;
public $accion = 1;

public $fechaAct;
public $etapa_dur;
public function render()
{
    $this->datosEstanteria = Estanteria::all();
    $this->datosTamano = Tamano::all();
    $this->datosEtapa = Etapa::all();

    //$this->etapa_dur = Etapa::find($this->id_etapa)->get('duracionEstimada');
    $this->etapa_dur = Etapa::select('duracionEstimada')->where('id', $this->id_etapa)->value('duracionEstimada');

    $etp_dur = '+' . $this->etapa_dur . ' month';

    $this->fechaAct = date('Y-m-d');
    $this->fechaestimada = strtotime('' . $etp_dur . '', strtotime($this->fechaAct));
    $this->fechaestimada = date('Y-m-d', $this->fechaestimada);

    $patronaje = Patronaje::join('etapas as ep', 'ep.id', 'patronajes.etapa_id')
        ->join('tamanos as tm', 'tm.id', 'patronajes.tamano_id')
        ->join('estanterias as et', 'et.id', 'patronajes.estanteria_id')
        ->select('ep.name as name_etap', 'patronajes.id', 'tm.name as name_tama', 'fechaPatronaje', 'et.name as name_estant', 'fechaEstimada', 'observacion', 'cantidad')
        ->get();

    return view('livewire.patronaje-controller', compact('patronaje'));
}

public function limpiar()
{
    $this->observacion = '';
    $this->cantidad = '';
}
public function store()
{

    Patronaje::create([
        'fechaPatronaje' => $this->fechaAct,
        'fechaEstimada' => $this->fechaestimada,
        'observacion' => $this->observacion,
        'cantidad' => $this->cantidad,
        'estanteria_id' => $this->id_estanteria,
        'tamano_id' => $this->id_tamano,
        'etapa_id' => $this->id_etapa,
    ]);
    $this->accion = 1;
    $this->limpiar();
}

public function editar($id)
{

    $this->accion = 3;
    $datos = Patronaje::find($id);
    $this->id_patronaje = $datos->id;
    $this->fechaestimada = $datos->fechaEstimada;
    $this->observacion = $datos->observacion;
    $this->cantidad = $datos->cantidad;
    $this->id_estanteria = $datos->estanteria_id;
    $this->id_tamano = $datos->tamano_id;
    $this->id_etapa = $datos->etapa_id;
}

public function actualizar()
{

    $datos = Patronaje::find($this->id_patronaje);
    $datos->update([
        'fechaPatronaje' => '2020-03-24',
        'fechaEstimada' => $this->fechaestimada,
        'observacion' => $this->observacion,
        'cantidad' => $this->cantidad,
        'estanteria_id' => $this->id_estanteria,
        'tamano_id' => $this->id_tamano,
        'etapa_id' => $this->id_etapa,
    ]);
    $this->accion = 1;
    return view('livewire.patronaje-controller');
}
    
}
