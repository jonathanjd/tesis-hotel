<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class OrderServicioController extends Controller
{
    //
    public function index()
    {
        # code...
        $now = Carbon::today();
        return view('orden.index')->with('now', $now);
    }
}
