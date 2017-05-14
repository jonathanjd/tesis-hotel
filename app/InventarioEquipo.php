<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioEquipo extends Model
{
    //
    protected $table = 'inventario_equipos';

    protected $fillable = [
        'cantidad', 'existencia', 'producto_servicio_id',
    ];

    public function productService()
    {
        return $this->belongsTo('App\ProductoServicio');
    }
}
