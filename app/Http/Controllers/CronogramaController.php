<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class CronogramaController extends Controller
{
    //
    public function index()
    {
        # code...
        $now = Carbon::today();
        return view('cronograma.index')->with('now', $now);
    }
}
