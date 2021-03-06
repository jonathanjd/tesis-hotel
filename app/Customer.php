<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'codigo_cte', 'cedula_rif', 'nombre',
        'domicilio', 'telefono', 'fax', 'email',
        'tipo_cte',
    ];

    public function contact()
    {
        return $this->hasOne('App\Contact');
    }

    public function budgets()
    {
        return $this->hasMany('App\Budget', 'codigo_budget');
    }


    public function scopeBuscarCustomer($query,$cedula)
    {
        # code...
        return $query->with('contact')->where('cedula_rif', $cedula)->first();
    }


    public function scopeBuscarCodigo($query)
    {
        # code...
        return $query
            ->select('codigo_cte')
            ->orderBy('codigo_cte', 'DESC')
            ->first();
    }

    public static function ultimoCodigo()
    {
        # code...
        $lastCodigo = Customer::buscarCodigo();

        if ($lastCodigo->exists()) {
            # code...
            return $lastCodigo->codigo_cte + 1;
        }else{
            return $lastCodigo = 1;
        }

    }
}
