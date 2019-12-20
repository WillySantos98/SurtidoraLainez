<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aplicacion_id');
            $table->string('nombre_interesado');
            $table->string('apellido_interesado');
            $table->string('identificacion_interesado', 15);
            $table->string('telefono', 10);
            $table->string('direccion',1000);
            $table->string('cod_cotizacion');
            $table->integer('estado');
            $table->date('fecha_creacion');
            $table->date('fecha_cierre')->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('colaborador_id');
            $table->integer('estado_condicion')->nullable();
            $table->unsignedBigInteger('modelo_id');
            $table->integer('veces_contactado')->nullable();
            $table->foreign('aplicacion_id')->references('id')->on('aplicacion_modelos');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->string('total_pagar');
            $table->string('prima')->nullable();
            $table->integer('meses')->nullable();
            $table->integer('intervalo_tiempo_pago')->nullable();
            $table->string('cuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
