<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteMorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_moras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("cuenta_id");
            $table->integer('estado');
            $table->date('proximo_recordatorio');
            $table->date('ultima_modificacion');
            $table->integer('importancia');
            $table->string('codigo_reporte');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
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
        Schema::dropIfExists('reporte_moras');
    }
}
