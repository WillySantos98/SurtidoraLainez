<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoCodMotoTableEntradamotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entrada_motocicletas', function (Blueprint $table) {
            $table->string('id_moto', 22);
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
            $table->dropColumn(['id_moto']);
        });
    }
}
