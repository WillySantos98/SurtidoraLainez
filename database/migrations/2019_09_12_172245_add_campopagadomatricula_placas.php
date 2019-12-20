<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampopagadomatriculaPlacas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->integer('estado_pago_matricula')->nullable();
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
            $table->dropColumn(['estado_pago_matricula']);
        });
    }
}
