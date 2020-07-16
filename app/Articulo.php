<?php

namespace Dulceria;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = "articulos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo','nombre','stock','estado','categorias_id',
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
