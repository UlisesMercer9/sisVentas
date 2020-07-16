<?php

namespace Dulceria;

use Illuminate\Database\Eloquent\Model;

class DetalleIngresos extends Model
{
     protected $table = "detalle_ingresos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cantidad','precio_compra','precio_venta','ingreso_id','articulo_id',
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
