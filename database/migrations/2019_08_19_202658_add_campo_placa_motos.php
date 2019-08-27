<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoPlacaMotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrada_motocicletas', function (Blueprint $table) {
            $table->integer('estado_placa');
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
            $table->dropColumn(['estado_placa']);
        });
    }
}
