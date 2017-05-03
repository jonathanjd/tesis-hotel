<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'contacto_c1', 'cargo_dpto_c1', 'telefono_c1',
        'contacto_c2', 'cargo_dpto_c2', 'telefono_c2',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

}
