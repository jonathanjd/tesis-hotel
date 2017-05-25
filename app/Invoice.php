<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = 
    [
        'numero_invoice', 'numero_control',
        'date', 'total', 'estado_invoice',
        'budget_id'
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

}
