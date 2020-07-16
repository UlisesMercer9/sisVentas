<?php

namespace Dulceria;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_comprobante','serie_comprobante','num_comprobante','fecha_hora','total_venta','estado','cliente_id',
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
