<?php

namespace Dulceria;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_persona','nombre','telefono','direccion','email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


}
