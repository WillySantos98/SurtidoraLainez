<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('pago_id');
            $table->string('pago_neto');
            $table->integer('dias_mora')->nullable();
            $table->string('interes');
            $table->integer('estado');
            $table->date('fecha_inicio');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->foreign('pago_id')->references('id')->on('pagos_cuentas');
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
        Schema::dropIfExists('moras');
    }
}
