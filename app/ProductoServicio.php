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

    public function scopeBuscarCodSalon($query)
    {
        # code...
        return $query
            ->select('id')
            ->orderBy('id', 'DESC')
            ->where('categoria','salones')
            ->first();
    }

    public static function autoIncrementoSalon()
    {
        # code...
        $codigo = ProductoServicio::buscarCodSalon();

        if ($codigo->exists()) {
            # code...
            return $codigo->id + 1;
        }else{
            return $codigo = 1;
        }

    }

    public function scopeBuscarNombreSalon($query, $value)
    {
        # code...
        return $query->where('categoria','salones')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoSalon($query, $value)
    {
        # code...
        return $query->where('categoria','salones')->where('codigops','like', $value)->get();
    }
}
