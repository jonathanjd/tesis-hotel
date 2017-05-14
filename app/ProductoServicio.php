<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    //
    protected $table = 'producto_servicios';

    protected $fillable = [
        'codigops', 'categoria', 'nombre', 'precio',
    ];

    public function tipoMontajes()
    {
        return $this->hasMany('App\TipoMontaje');
    }

    public function invetarioEquipos()
    {
        return $this->hasMany('App\InventarioEquipo');
    }
}
