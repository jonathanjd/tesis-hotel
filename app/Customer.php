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
}
