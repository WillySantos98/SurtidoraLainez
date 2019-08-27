<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoEstadoEnlazoPlaca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('placas', function (Blueprint $table) {
            $table->integer('estado_enlazo');
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
            $table->dropColumn(['estado_enlazo']);
        });
    }
}
