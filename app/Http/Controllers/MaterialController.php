<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materiales = ProductoServicio::orderBy('id','DESC')->where('categoria', 'material')->get();
        return response()->json($materiales);
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
        $material = new ProductoServicio();
        $material->codigops = $request->codigo;
        $material->categoria = $request->categoria;
        $material->nombre = $request->nombre;
        $material->precio = $request->precio;
        $material->save();
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
        $material = ProductoServicio::find($id);
        $material->nombre = $request->nombre;
        $material->precio = $request->precio;
        $material->save();
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
        $material = ProductoServicio::find($id);
        $material->delete();
    }

    public function autoIncrementoMaterial()
    {
        # code...
        $material = ProductoServicio::autoIncrementoMaterial();
        return response()->json($material);
    }

    public function buscarNombreMaterial($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreMaterial($value);
        return response()->json($response);
    }

    public function buscarCodigoMaterial($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoMaterial($value);
        return response()->json($response);
    }
}
