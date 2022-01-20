<?php

namespace App\Http\Livewire;

use App\Models\Estanteria;
use App\Models\Etapa;
use App\Models\Injertacion;
use App\Models\Patronaje;
use App\Models\Producto;
use App\Models\Tamano;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Brian2694\Toastr\Facades\Toastr;
use phpDocumentor\Reflection\Types\This;

class PatronajeController extends Component
{
    public $fechaestimada, $observacion, $id_etapa,
        $id_tamano, $id_estanteria, $datosTamano, $fechaAct, $etapa_dur, $etapamaestra, $datosEtapa, $datosEstanteria, $cantidad, $id_patronaje;

    public $id_producto;

    public $query;
    public $accion = 1;
    public $vista = 1;


    public function render()
    {
        $this->datosEstanteria = Estanteria::all()->where('status', '=', 'available');
        $this->datosTamano = Tamano::all();
        $this->datosEtapa = Etapa::select()->where('etapa_maestra', 2)->get();

        //$this->etapa_dur = Etapa::find($this->id_etapa)->get('duracionEstimada');
        $this->etapa_dur = Etapa::select('duracionEstimada')->where('id', $this->id_etapa)->value('duracionEstimada');

        $etp_dur = '+' . $this->etapa_dur . ' month';

        $this->fechaAct = date('Y-m-d');
        $this->fechaestimada = strtotime('' . $etp_dur . '', strtotime($this->fechaAct));
        $this->fechaestimada = date('Y-m-d', $this->fechaestimada);

        //$netapa = DB::table('etapas')->get();

        $patronaje = Patronaje::join('etapas as ep', 'ep.id', 'patronajes.etapa_id')
            ->join('tamanos as tm', 'tm.id', 'patronajes.tamano_id')
            ->join('estanterias as et', 'et.id', 'patronajes.estanteria_id')
            ->select('ep.name as name_etap', 'patronajes.id', 'tm.name as name_tama', 'fechaPatronaje', 'et.name as name_estant', 'fechaEstimada', 'observacion', 'cantidad')
            ->get();


        $injertacion = Injertacion::join('etapas as ep', 'ep.id', 'injertacions.etapa_id')
            ->join('tamanos as tm', 'tm.id', 'injertacions.tamano_id')
            ->join('estanterias as et', 'et.id', 'injertacions.estanteria_id')
            ->select('ep.name as name_etap', 'injertacions.id', 'tm.name as name_tama', 'fechaInjertacion', 'et.name as name_estant', 'fechaEstimada', 'observacion', 'cantidad')
            ->get();




        if ($this->vista == 1) {
            return view('livewire.patronaje-controller', compact('patronaje', 'injertacion'));
        } else {
            return view('livewire.vista-combinada', compact('patronaje'));
        }
    }

    public function limpiar()
    {
        $this->observacion = '';
        $this->cantidad = '';
    }
    public function store()
    {

        Estanteria::find($this->id_estanteria)->update([
            'status' => 'busy',
        ]);

        $this->query = Producto::select()->where('etapa_id', $this->id_etapa)->first();

        Producto::find($this->query->id)->update([
            'cantidad_demandada' => $this->cantidad,
        ]);

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
        Toastr::success('Datos Guardado Exitosamente!');
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
        Toastr::success('Datos Actualizado Exitosamente!');
        return view('livewire.patronaje-controller');
    }
    public function eliminar($id)
    {
        $datos = Patronaje::find($id);
        $this->id_patronaje = $datos->id;
        $datos->delete();
        Toastr::success('Datos Eliminado Exitosamente!');
    }
}
