<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidas = ProductoServicio::orderBy('id','DESC')->where('categoria', 'bebida')->get();
        return response()->json($bebidas);
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
        $bebida = new ProductoServicio();
        $bebida->codigops = $request->codigo;
        $bebida->categoria = $request->categoria;
        $bebida->nombre = $request->nombre;
        $bebida->precio = $request->precio;
        $bebida->save();
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
        $bebida = ProductoServicio::find($id);
        $bebida->nombre = $request->nombre;
        $bebida->precio = $request->precio;
        $bebida->save();
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
        $bebida = ProductoServicio::find($id);
        $bebida->delete();
    }

    public function autoIncrementoBebida()
    {
        # code...
        $bebida = ProductoServicio::autoIncrementoBebida();
        return response()->json($bebida);
    }

    public function buscarNombreBebida($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreBebida($value);
        return response()->json($response);
    }

    public function buscarCodigoBebida($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoBebida($value);
        return response()->json($response);
    }
}
