<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoNivelCuerpoReporteMora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuerpo_reporte_moras', function (Blueprint $table) {
            $table->integer('nivel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuerpo_reporte_moras', function (Blueprint $table) {
            $table->dropColumn(['nivel']);
        });
    }
}
