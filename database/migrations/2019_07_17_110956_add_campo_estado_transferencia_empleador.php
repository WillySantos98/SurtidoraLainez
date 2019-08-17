<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoEstadoTransferenciaEmpleador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transferencias', function (Blueprint $table) {
            $table->integer('estado_c')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transferencias', function (Blueprint $table) {
            $table->dropColumn(['estado_c']);
        });
    }
}
