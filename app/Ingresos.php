<?php

namespace Dulceria;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    protected $table = "ingresos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_comprobante','serie_comprobante','num_comprobante','fecha_hora','estado','proveedor_id',
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
