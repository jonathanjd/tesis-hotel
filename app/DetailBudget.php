<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBudget extends Model
{
    //
    protected $table = 'detail_budgets';

    protected $fillable = 
    [
        'cantidad', 'dias', 'precio_total',
        'hora', 'fecha_inic', 'fecha_fin',
        'descripcion', 'descuento', 'budget_id',
        'producto_servicio_id'
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

    public function productoServicios()
    {
        return $this->belongsTo('App\ProductoServicio', 'producto_servicio_id');
    }
}
