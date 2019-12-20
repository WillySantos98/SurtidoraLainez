<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcamposInforecibos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_recibos', function (Blueprint $table) {
            $table->string('dato7')->nullable();
            $table->string('dato8')->nullable();
            $table->string('dato9')->nullable();
            $table->string('dato10')->nullable();
            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::table('info_recibos', function (Blueprint $table) {
            $table->dropColumn(['dato7','dato8','dato9','dato10','estado','sucursal_id']);
        });
    }
}
