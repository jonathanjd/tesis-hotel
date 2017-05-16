<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $fillable = [
        'codigoevento', 'nombre',
    ];

    public function scopeBuscarCodigo($query)
    {
        # code...
        return $query
            ->select('id')
            ->orderBy('id', 'DESC')
            ->first();
    }

    public static function autoIncrementoEvento()
    {
        # code...
        $codigo = Evento::buscarCodigo();

        if ($codigo->exists()) {
            # code...
            return $codigo->id + 1;
        }else{
            return $codigo = 1;
        }

    }

    public function scopeBuscarNombreEvento($query, $value)
    {
        # code...
        return $query->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoEvento($query, $value)
    {
        # code...
        return $query->where('codigoevento','like', $value)->get();
    }


}
