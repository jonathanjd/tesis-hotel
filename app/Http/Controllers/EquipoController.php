<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductoServicio;

use App\InventarioEquipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipo = ProductoServicio::with('invetarioEquipos')->orderBy('id','DESC')->where('categoria', 'equipo')->get();
        return response()->json($equipo);
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
        $equipo = new ProductoServicio();
        $equipo->codigops = $request->codigo;
        $equipo->categoria = $request->categoria;
        $equipo->nombre = $request->nombre;
        $equipo->precio = $request->precio;
        $equipo->save();

        $inventatio = new InventarioEquipo();
        $inventatio->cantidad = $request->cantidad;
        $inventatio->existencia = $request->cantidad;
        $inventario->producto_servicio_id = $equipo->id;
        $inventario->save();

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
        $equipo = ProductoServicio::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->precio = $request->precio;
        $equipo->save();

        $inventario = InventarioEquipo::find($equipo->invetarioEquipos[0]->id);
        $inventario->cantidad = $request->cantidad;
        $inventario->existencia = $request->cantidad;
        $inventario->save();
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
        $equipo = ProductoServicio::find($id);
        $equipo->delete();
    }

    public function autoIncrementoEquipo()
    {
        # code...
        $equipo = ProductoServicio::autoIncrementoEquipo();
        return response()->json($equipo);
    }

    public function buscarNombreEquipo($value)
    {
        # code...
        $response = ProductoServicio::with('invetarioEquipos')->buscarNombreEquipo($value);
        return response()->json($response);
    }

    public function buscarCodigoEquipo($value)
    {
        # code...
        $response = ProductoServicio::with('invetarioEquipos')->buscarCodigoEquipo($value);
        return response()->json($response);
    }
}
