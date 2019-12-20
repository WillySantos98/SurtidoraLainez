<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoUltimoDiaRevisionMoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moras', function (Blueprint $table) {
            $table->date('revision')->nullable();
            $table->string('codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moras', function (Blueprint $table) {
            $table->dropColumn(['revision', 'codigo']);
        });
    }
}
