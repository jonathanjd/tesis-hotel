<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailEvento extends Model
{
    //
    protected $table = 'detail_eventos';

    protected $fillable = 
    [
        'fecha_inic', 'fecha_fin', 'hora',
        'personas', 'observacion', 'budget_id',
        'evento_id',
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }

    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }

}
