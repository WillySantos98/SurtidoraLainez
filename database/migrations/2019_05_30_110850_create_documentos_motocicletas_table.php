<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosMotocicletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_motocicletas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('casco', 1);
            $table->string('hoja_garantia', 1);
            $table->string('llaves', 1);
            $table->string('bateria', 1);
            $table->string('acido_bateria', 1);
            $table->unsignedBigInteger('entrada_id');
            $table->foreign('entrada_id')->references('id')->on('entrada_motocicletas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_motocicletas');
    }
}
