<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoCodConsignacionTableEntradamotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrada_motocicletas', function (Blueprint $table) {
            $table->unsignedBigInteger('consignacion_id');
            $table->foreign('consignacion_id')->references('id')->on('consignacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entrada_motocicletas', function (Blueprint $table) {
            $table->dropColumn(['consignacion_id']);
        });
    }
}
