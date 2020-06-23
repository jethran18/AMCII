<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "Usuario";
    protected $fillable = [
        'nombre',
        'apellidos',
        'username',
        'password',
        'email',
        'rol'
    ];

    public function actividades(){
        return $this->hasMany('App\Actividad');
    }
}
