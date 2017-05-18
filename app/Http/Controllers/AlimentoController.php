<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alimentos = ProductoServicio::orderBy('id','DESC')->where('categoria', 'alimento')->get();
        return response()->json($alimentos);
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
        $alimento = new ProductoServicio();
        $alimento->codigops = $request->codigo;
        $alimento->categoria = $request->categoria;
        $alimento->nombre = $request->nombre;
        $alimento->precio = $request->precio;
        $alimento->save();
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
        $alimento = ProductoServicio::find($id);
        $alimento->nombre = $request->nombre;
        $alimento->precio = $request->precio;
        $alimento->save();
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
        $alimento = ProductoServicio::find($id);
        $alimento->delete();
    }

    public function autoIncrementoAlimento()
    {
        # code...
        $alimento = ProductoServicio::autoIncrementoAlimento();
        return response()->json($alimento);
    }

    public function buscarNombreAlimento($value)
    {
        # code...
        $response = ProductoServicio::buscarNombreAlimento($value);
        return response()->json($response);
    }

    public function buscarCodigoAlimento($value)
    {
        # code...
        $response = ProductoServicio::buscarCodigoAlimento($value);
        return response()->json($response);
    }
}
