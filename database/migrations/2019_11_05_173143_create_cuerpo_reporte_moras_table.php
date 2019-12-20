<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuerpoReporteMorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuerpo_reporte_moras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reporte_id');
            $table->string('observacion', 500);
            $table->date('fecha');
            $table->integer('forma_contactado');
            $table->string('codigo');
            $table->integer('resultado');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('cuerpo_reporte_moras');
    }
}
