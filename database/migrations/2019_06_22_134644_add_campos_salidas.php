<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposSalidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salidas', function (Blueprint $table) {
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('sucrusal_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
            $table->foreign('sucrusal_id')->references('id')->on('sucursals');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salidas', function (Blueprint $table) {
            $table->dropColumn(['colaborador_id','sucursal_id','usuario_id']);

        });
    }
}
