<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposPropias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propias', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propias', function (Blueprint $table) {
            $table->dropColumn(['usuario_id','sucursal_id','colaborador_id']);
        });
    }
}
