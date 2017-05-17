<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salones = ProductoServicio::orderBy('id','DESC')->get();
        return response()->json($salones);
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
        $salon = new ProductoServicio();
        $salon->codigops = $request->codigo;
        $salon->categoria = $request->categoria;
        $salon->nombre = $request->nombre;
        $salon->precio = $request->precio;
        $salon->save();
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
        $salon = ProductoServicio::find($id);
        $salon->nombre = $request->nombre;
        $salon->precio = $request->precio;
        $salon->save();
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
        $salon = ProductoServicio::find($id);
        $salon->delete();
    }

    public function autoIncrementoSalon()
    {
        # code...
        $salon = ProductoServicio::autoIncrementoSalon();
        return response()->json($salon);
    }

    public function buscarNombreSalon($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreSalon($value);
        return response()->json($response);
    }

    public function buscarCodigoSalon($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoSalon($value);
        return response()->json($response);
    }
}
