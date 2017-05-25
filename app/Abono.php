<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    //
    protected $fillable = 
    [
        'numero_recibo', 'fecha_pago', 'monto',
        'forma_pago', 'numero_comprobante', 'banco',
        'concepto', 'budget_id'
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }
}
