<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromesasReporteMorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promesas_reporte_moras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reporte_id');
            $table->date('fecha_promesa');
            $table->string('descripcion');
            $table->string('referencia');
            $table->string('pago_acordado');
            $table->foreign('reporte_id')->references('id')->on('reporte_moras');
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
        Schema::dropIfExists('promesas_reporte_moras');
    }
}
