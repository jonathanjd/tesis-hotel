<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Budget;

use App\Evento;

use App\ProductoServicio;

use App\DetailBudget;

use App\DetailEvento;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $now = Carbon::now();
        $listEvento = Evento::all();
        $listSalones = ProductoServicio::where('categoria', 'salones')->get();
        return view('presupuesto.index')
            ->with('now', $now)
            ->with('listSalones', $listSalones)
            ->with('listEvento', $listEvento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $presupuesto = new Budget();
        $presupuesto->codigo_budget = $request->codigoPresupuesto;
        $presupuesto->fecha_emision = $request->fechaEmisionPresupuesto;
        $presupuesto->subtotal = $request->subTotalPresupuesto;
        $presupuesto->iva = $request->ivaPresupuesto;
        $presupuesto->total_general = $request->totalGeneralPresupuesto;
        $presupuesto->confirmado = $request->confirmadoPresupuesto;
        $presupuesto->fecha_confirmacion = $request->fechaConfirmadoPresupuesto;
        $presupuesto->saldo = $request->saldoPresupuesto;
        $presupuesto->customer_id = $request->userIdPresupuesto;
        $presupuesto->save();

        $detalleEvento = new DetailEvento();
        $fechaInicioEventoD = Carbon::createFromFormat('d-m-Y', $request->fechaInicioEventoD);
        $detalleEvento->fecha_inic = $fechaInicioEventoD->format('Y-m-d');
        $fechaFinEventoD = Carbon::createFromFormat('d-m-Y', $request->fechaFinEventoD);
        $detalleEvento->fecha_fin = $fechaFinEventoD->format('Y-m-d');
        $detalleEvento->hora = $request->horaEventoD;
        $detalleEvento->personas = $request->nPersonasEventoD;
        $detalleEvento->observacion = $request->observacionEventoD;
        $detalleEvento->budget()->associate($presupuesto);
        $detalleEvento->evento_id = $request->idEventoD;
        $detalleEvento->save();

        foreach ($request->detallesPresupuesto as $detalle) {
            # code...
            $detalle = (object) $detalle;
            $detallePresupuesto = new DetailBudget();
            $detallePresupuesto->cantidad = $detalle->cantidad;
            $detallePresupuesto->dias = $detalle->dias;
            $detallePresupuesto->precio_total = $detalle->total;
            $detallePresupuesto->descripcion = $detalle->descripcion;
            $detallePresupuesto->budget()->associate($presupuesto);
            $detallePresupuesto->producto_servicio_id = $detalle->id;
            $detallePresupuesto->save();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autoIncrementoPresupuesto()
    {
        # code...
        $codigo = Budget::autoIncrementoBudget();
        $fechaActual = Carbon::now();
        $response =
        [
            'codigo' => $codigo,
            'fechaActual' => $fechaActual->format('Y-m-d'),
        ];
        return response()->json($response);
    }

    /**
     * [listarSalon Mostrar la lista de Salones]
     * @return [json] [salones]
     */
    public function precioSalon($nombre)
    {
        # code...
        $salones = ProductoServicio::where([['categoria', 'salones'],['nombre', $nombre]])->first();
        return response()->json($salones);
    }

    /**
     * [listarEvento Mostrar la lista e Evento]
     * @return [json] [eventos]
     */
    public function precioMontaje($nombre, $tipo)
    {
        # code...
        $montaje = ProductoServicio::precioMontaje($nombre, $tipo);
        return response()->json($montaje);
    }

    /**
     * Mostrar Lista de Alimentos
     *
     * @return json Alimentos
     */
    public function listarAlimentos()
    {
        # code...
        $alimentos = ProductoServicio::where('categoria', 'alimento')->get();
        return response()->json($alimentos);
    }

    /**
     * Mostrar Lista de Bebidas
     *
     * @return json
     */
    public function listarBebidas()
    {
        # code...
        $bebidas = ProductoServicio::where('categoria', 'bebida')->get();
        return response()->json($bebidas);
    }

    /**
     * Mostrar Lista de Materiales
     *
     * @return json
     */
    public function listarMateriales()
    {
        # code...
        $materiales = ProductoServicio::where('categoria', 'material')->get();
        return response()->json($materiales);
    }

    public function listarEquipos()
    {
        # code...
        $equipos = ProductoServicio::with('inventarioEquipos')->where('categoria', 'equipo')->get();
        return response()->json($equipos);
    }

}
