<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $habitaciones = ProductoServicio::orderBy('id','DESC')->where('categoria', 'habitacion')->get();
        return response()->json($habitaciones);
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
        $habitacion = new ProductoServicio();
        $habitacion->codigops = $request->codigo;
        $habitacion->categoria = $request->categoria;
        $habitacion->nombre = $request->nombre;
        $habitacion->precio = $request->precio;
        $habitacion->save();
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
        if (ProductoServicio::find($id)) {
            # code...
            $data = [
                'existe' => true,
            ];
        }else {
            # code...
            $data = [
                'existe' => false,
            ];
        }

        return response()->json($data);
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
        $habitacion = ProductoServicio::find($id);
        $habitacion->nombre = $request->nombre;
        $habitacion->precio = $request->precio;
        $habitacion->save();
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
        $habitacion = ProductoServicio::find($id);
        $habitacion->delete();
    }

    public function autoIncrementoHabitacion()
    {
        # code...
        $habitacion = ProductoServicio::autoIncrementoHabitacion();
        return response()->json($habitacion);
    }

    public function buscarNombreHabitacion($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreHabitacion($value);
        return response()->json($response);
    }

    public function buscarCodigoHabitacion($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoHabitacion($value);
        return response()->json($response);
    }
}
