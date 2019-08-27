<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoVentaPlacas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('salidas');
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
            $table->dropColumn(['venta_id']);
        });
    }
}
