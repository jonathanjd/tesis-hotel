<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos = Evento::orderBy('id','DESC')->get();
        return response()->json($eventos);
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
        $evento = new Evento();
        $evento->codigoevento = $request->codigo;
        $evento->nombre = $request->nombre;
        $evento->save();

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
        if (Evento::find($id)) {
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
        $evento = Evento::find($id);
        $evento->nombre = $request->nombre;
        $evento->save();
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
        $evento = Evento::find($id);
        $evento->delete();

    }

    public function autoIncrementoEvento()
    {
        # code...
        $evento = Evento::autoIncrementoEvento();
        return response()->json($evento);
    }

    public function buscarNombreEvento($value)
    {
        # code...
        $response = Evento::buscarNombreEvento($value);
        return response()->json($response);
    }

    public function buscarCodigoEvento($value)
    {
        # code...
        $response = Evento::buscarCodigoEvento($value);
        return response()->json($response);
    }

    public function getCodigoEvento($nombre)
    {
        # code...
        $response = Evento::where('nombre', $nombre)->first();
        return response()->json($response);
    }

    
}
