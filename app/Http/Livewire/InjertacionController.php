<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use App\Models\Etapa;
use App\Models\Injertacion;
use App\Models\Patronaje;
use App\Models\Producto;
use App\Models\Tamano;
use Carbon\Carbon;
use Livewire\Component;
use Brian2694\Toastr\Facades\Toastr;

class InjertacionController extends Component
{
    public $fechaestimada, $observacion, $id_etapa,
        $id_tamano, $id_estanteria, $datosTamano, $datosEtapa, $datosEstanteria, $cantidad;

    public $id_injertacion, $fechaAct, $etapa_dur, $all_patronajes, $query, $option_patronaje, $etapamaestra, $op;
    public $accion = 1;

    public $opc = 1;
    public $vista = 1;

    public function render()
    {
        if ($this->opc == 1) {
            $this->datosEstanteria = Estanteria::all()->where('status', '=', 'available');
        } else {
            $this->datosEstanteria = Estanteria::all();
        }


        $this->datosTamano = Tamano::all();
        $this->datosEtapa = Etapa::select()->where('etapa_maestra', 1)->get();


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

        $patronaje = Patronaje::join('etapas as ep', 'ep.id', 'patronajes.etapa_id')
            ->join('tamanos as tm', 'tm.id', 'patronajes.tamano_id')
            ->join('estanterias as et', 'et.id', 'patronajes.estanteria_id')
            ->select('ep.name as name_etap', 'patronajes.id', 'tm.name as name_tama', 'fechaPatronaje', 'et.name as name_estant', 'fechaEstimada', 'observacion', 'cantidad')
            ->get();

        if (!is_null($this->option_patronaje)) {
            $data = Patronaje::find($this->option_patronaje);
            $this->observacion = $data->observacion;
            $this->cantidad = $data->cantidad;
            $this->id_estanteria = $data->estanteria_id;
            $this->id_tamano = $data->tamano_id;
        }

        if ($this->vista == 1) {
            return view('livewire.injertacion-controller', compact('injertacion', 'patronaje'));
        } else {
            return view('livewire.vista-combinada-injertacion', compact('injertacion', 'patronaje'));
        }
    }

    public function limpiar()
    {
        $this->observacion = '';
        $this->cantidad = '';
    }
    public function store()
    {
        if ($this->opc == 1) {
            Estanteria::find($this->id_estanteria)->update([
                'status' => 'busy',
            ]);
            $this->query = Producto::select()->where('etapa_id', $this->id_etapa)->first();

            $totalStock = $this->query->stock - $this->cantidad;

            Producto::find($this->query->id)->update([
                'cantidad_demandada' => $this->cantidad,
                'stock' => $totalStock,
            ]);

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
            Toastr::success('Datos Guardado Exitosamente!');
        } else {
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
            Toastr::success('Datos Guardado Exitosamente!');
        }
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
        Toastr::success('Datos Actualizado Exitosamente!');
        return view('livewire.injertacion-controller');
    }
    public function eliminar($id)
    {
        $datos = Injertacion::find($id);
        $this->id_injertacion = $datos->id;
        $datos->delete();
        Toastr::success('Datos Eliminado Exitosamente!');
    }
}
