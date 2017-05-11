<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class DisponibilidadController extends Controller
{
    //
    public function index(){

        $now = Carbon::today();
        return view('disponibilidad.index')->with('now', $now);

    }
}
