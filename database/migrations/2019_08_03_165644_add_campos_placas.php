<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposPlacas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_registrador' );
            $table->unsignedBigInteger('almacen_entrada' );
            $table->foreign('usuario_registrador')->references('id')->on('users');
            $table->foreign('almacen_entrada')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->dropColumn(['usuario_refistrador','almacen_entrada']);
        });
    }
}
