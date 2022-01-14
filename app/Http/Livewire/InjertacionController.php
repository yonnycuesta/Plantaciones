<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use App\Models\Etapa;
use App\Models\Injertacion;
use App\Models\Tamano;
use Carbon\Carbon;
use Livewire\Component;

class InjertacionController extends Component
{
    public $fechaestimada, $observacion, $id_etapa,
        $id_tamano, $id_estanteria, $datosTamano, $datosEtapa, $datosEstanteria, $cantidad;

    public $id_injertacion;
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

        $injertacion = Injertacion::join('etapas as ep', 'ep.id', 'injertacions.etapa_id')
            ->join('tamanos as tm', 'tm.id', 'injertacions.tamano_id')
            ->join('estanterias as et', 'et.id', 'injertacions.estanteria_id')
            ->select('ep.name as name_etap', 'injertacions.id', 'tm.name as name_tama', 'fechaInjertacion', 'et.name as name_estant', 'fechaEstimada', 'observacion', 'cantidad')
            ->get();

        return view('livewire.injertacion-controller', compact('injertacion'));
    }

    public function limpiar()
    {
        $this->observacion = '';
        $this->cantidad = '';
    }
    public function store()
    {

        Injertacion::create([
            'fechaInjertacion' => $this->fechaAct,
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
        $datos = Injertacion::find($id);
        $this->id_injertacion = $datos->id;
        $this->fechaestimada = $datos->fechaEstimada;
        $this->observacion = $datos->observacion;
        $this->cantidad = $datos->cantidad;
        $this->id_estanteria = $datos->estanteria_id;
        $this->id_tamano = $datos->tamano_id;
        $this->id_etapa = $datos->etapa_id;
    }

    public function actualizar()
    {

        $datos = Injertacion::find($this->id_injertacion);
        $datos->update([
            'fechaInjertacion' => '2020-03-24',
            'fechaEstimada' => $this->fechaestimada,
            'observacion' => $this->observacion,
            'cantidad' => $this->cantidad,
            'estanteria_id' => $this->id_estanteria,
            'tamano_id' => $this->id_tamano,
            'etapa_id' => $this->id_etapa,
        ]);
        $this->accion = 1;
        return view('livewire.injertacion-controller');
    }
}
