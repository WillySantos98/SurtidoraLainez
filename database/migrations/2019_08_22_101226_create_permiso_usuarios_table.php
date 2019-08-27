<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_usuario');
            $table->integer('tareas');
            $table->integer('usuarios');
            $table->integer('clientes');
            $table->integer('avales');
            $table->integer('inventario');
            $table->integer('inventario_disponible');
            $table->integer('gestion_motocicletas');
            $table->integer('gestion_placas');
            $table->foreign('tipo_usuario')->references('id')->on('tipo_usuarios');
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
        Schema::dropIfExists('permiso_usuarios');
    }
}
