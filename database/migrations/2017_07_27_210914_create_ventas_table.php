<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_comprobante',50);
            $table->string('serie_comprobante',50);
            $table->string('num_comprobante',50);
            $table->dateTime('fecha_hora');
            $table->decimal('total_venta',11,2);
            $table->string('estado',50);
            $table->timestamps();
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
