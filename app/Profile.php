<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'nombreemp', 'profesion', 'cargo', 'departamento',
        'tiempoemp', 'celular', 'tlfcasa', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
