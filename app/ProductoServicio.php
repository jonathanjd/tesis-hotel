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

    public function inventarioEquipos()
    {
        return $this->hasMany('App\InventarioEquipo');
    }

    public function scopeBuscarCodSalon($query)
    {
        # code...
        return $query->where('categoria','salones');
          
    }

    public function scopeBuscarCodMontaje($query)
    {
        # code...
        return $query->where('categoria','montaje');
    }

    public function scopeBuscarCodAlimento($query)
    {
        # code...
        return $query->where('categoria','alimento');
    }

    public function scopeBuscarCodBebida($query)
    {
        # code...
        return $query->where('categoria','bebida');
    }

    public function scopeBuscarCodMaterial($query)
    {
        # code...
        return $query->where('categoria','material');
    }

    public function scopeBuscarCodHabitacion($query)
    {
        # code...
        return $query->where('categoria','habitacion');
    }

    public function scopeBuscarCodOtroServicio($query)
    {
        # code...
        return $query->where('categoria','otroServicio');
    }

    public function scopeBuscarCodEquipo($query)
    {
        # code...
        return $query->where('categoria','equipo');
    }

    public static function autoIncrementoMontaje()
    {
        # code...
        $codigo = ProductoServicio::buscarCodMontaje();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoSalon()
    {
        # code...
        $codigo = ProductoServicio::buscarCodSalon();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoAlimento()
    {
        # code...
        $codigo = ProductoServicio::buscarCodAlimento();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoBebida()
    {
        # code...
        $codigo = ProductoServicio::buscarCodBebida();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoMaterial()
    {
        # code...
        $codigo = ProductoServicio::buscarCodMaterial();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoHabitacion()
    {
        # code...
        $codigo = ProductoServicio::buscarCodHabitacion();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoOtroServicio()
    {
        # code...
        $codigo = ProductoServicio::buscarCodOtroServicio();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public static function autoIncrementoEquipo()
    {
        # code...
        $codigo = ProductoServicio::buscarCodEquipo();

        if ($codigo->count() > 0) {
            # code...
            return $codigo->count() + 1;
        }else{
            return $codigo = 1;
        }

    }

    public function scopeBuscarNombreEquipo($query, $value)
    {
        # code...
        return $query->where('categoria','equipo')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoEquipo($query, $value)
    {
        # code...
        return $query->where('categoria','equipo')->where('codigops','like', $value)->get();
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

    public function scopeBuscarNombreMontaje($query, $value)
    {
        # code...
        return $query->where('categoria','montaje')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoMontaje($query, $value)
    {
        # code...
        return $query->where('categoria','montaje')->where('codigops','like', $value)->get();
    }

    public function scopeBuscarNombreAlimento($query, $value)
    {
        # code...
        return $query->where('categoria','alimento')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoAlimento($query, $value)
    {
        # code...
        return $query->where('categoria','alimento')->where('codigops','like', $value)->get();
    }

    public function scopeBuscarNombreBebida($query, $value)
    {
        # code...
        return $query->where('categoria','bebida')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoBebida($query, $value)
    {
        # code...
        return $query->where('categoria','bebida')->where('codigops','like', $value)->get();
    }

    public function scopeBuscarNombreMaterial($query, $value)
    {
        # code...
        return $query->where('categoria','material')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoMaterial($query, $value)
    {
        # code...
        return $query->where('categoria','material')->where('codigops','like', $value)->get();
    }

    public function scopeBuscarNombreHabitacion($query, $value)
    {
        # code...
        return $query->where('categoria','habitacion')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoHabitacion($query, $value)
    {
        # code...
        return $query->where('categoria','habitacion')->where('codigops','like', $value)->get();
    }

    public function scopeBuscarNombreOtroServicio($query, $value)
    {
        # code...
        return $query->where('categoria','otroServicio')->where('nombre','like', $value)->get();
    }

    public function scopeBuscarCodigoOtroServicio($query, $value)
    {
        # code...
        return $query->where('categoria','otroServicio')->where('codigops','like', $value)->get();
    }
}
