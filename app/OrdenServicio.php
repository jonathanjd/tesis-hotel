<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    //
    protected $table = 'orden_servicios';

    protected $fillable = 
    [
        'codigo_orden', 'fecha', 'obsv_cocina',
        'obsv_restaurant', 'obsv_coord_ab', 'obsv_mayordomia',
        'obsv_reception', 'obsv_eventoc', 'budget_id'
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

}
