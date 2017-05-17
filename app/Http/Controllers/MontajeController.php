<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

use App\TipoMontaje;

class MontajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $montaje = ProductoServicio::with('tipoMontajes')->orderBy('id','DESC')->where('categoria', 'montaje')->get();
        return response()->json($montaje);
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
        $montaje = new ProductoServicio();
        $montaje->codigops = $request->codigo;
        $montaje->categoria = $request->categoria;
        $montaje->nombre = $request->nombre;
        $montaje->precio = $request->precio;
        $montaje->save();

        $tipoMontaje = new TipoMontaje();
        $tipoMontaje->producto_servicio_id = $montaje->id;
        $tipoMontaje->tipomontaje = $request->tipo;
        $tipoMontaje->save();

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
        $montaje = ProductoServicio::find($id);
        $montaje->nombre = $request->nombre;
        $montaje->precio = $request->precio;
        $montaje->save();

        $tipoMontaje = TipoMontaje::find($montaje->tipoMontajes[0]->id);
        $tipoMontaje->tipomontaje = $request->tipo;
        $tipoMontaje->save();

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
        $montaje = ProductoServicio::find($id);
        $montaje->delete();
    }

    public function autoIncrementoMontaje()
    {
        # code...
        $montaje = ProductoServicio::autoIncrementoMontaje();
        return response()->json($montaje);

    }

    public function buscarCodigoMontaje($value)
    {
        # code...
        $response = ProductoServicio::with('tipoMontajes')->buscarCodigoMontaje($value);
        return response()->json($response);
    }

    public function buscarNombreMontaje($value)
    {
        # code...
        $response = ProductoServicio::with('tipoMontajes')->buscarNombreMontaje($value);
        return response()->json($response);
    }
}
