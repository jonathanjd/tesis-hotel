<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

class OtroServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $otroServicios = ProductoServicio::orderBy('id','DESC')->where('categoria', 'otroServicio')->get();
        return response()->json($otroServicios);
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
        $otroServicio = new ProductoServicio();
        $otroServicio->codigops = $request->codigo;
        $otroServicio->categoria = $request->categoria;
        $otroServicio->nombre = $request->nombre;
        $otroServicio->precio = $request->precio;
        $otroServicio->save();
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
        $otroServicio = ProductoServicio::find($id);
        $otroServicio->nombre = $request->nombre;
        $otroServicio->precio = $request->precio;
        $otroServicio->save();
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
        $otroServicio = ProductoServicio::find($id);
        $otroServicio->delete();
    }

    public function autoIncrementoOtroServicio()
    {
        # code...
        $otroServicio = ProductoServicio::autoIncrementoOtroServicio();
        return response()->json($otroServicio);
    }

    public function buscarNombreOtroServicio($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreOtroServicio($value);
        return response()->json($response);
    }

    public function buscarCodigoOtroServicio($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoOtroServicio($value);
        return response()->json($response);
    }
}
