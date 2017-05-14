<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMontaje extends Model
{
    //
    protected $table = 'tipo_montajes';

    protected $fillable = [
        'tipomontaje', 'producto_servicio_id',
    ];

    public function productService()
    {
        return $this->belongsTo('App\ProductoServicio');
    }
}
