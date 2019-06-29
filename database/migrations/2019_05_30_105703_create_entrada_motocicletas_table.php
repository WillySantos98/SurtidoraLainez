<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaMotocicletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_motocicletas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('modelo_id');
            $table->string('chasis',30);
            $table->string('motor', 30);
            $table->string('color', 40);
            $table->integer('ano');
            $table->date('fecha_entrada');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->string('observacion',350);
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
        Schema::dropIfExists('entrada_motocicletas');
    }
}
