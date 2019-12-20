<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salida_id'); //es para asociarla con la salida de la motociclecleta --
            $table->integer('plazo')->nullable(); //es la cantidad de meses que tiene para cancelar --
            $table->integer('intervalo_pago'); //si es quincenal o mensual --
            $table->integer('dias_gracia')->nullable(); //son los dias de gracia que tiene el cliente para realizar su pago --
            $table->string('cod_cuenta');//es el codigo que va a generar el sistema maximo 8 caracteres numeros al azar, el primer y el segundo  tienen ser iguales
            $table->string('saldo_financiar')->nullable(); //es el saldo financiado que se le esta dabdo al cliente
            $table->string('total_inicial_cuenta'); //es el saldo con el que comienza la cuenta
            $table->string('saldo_actual'); //es el saldo actual que se maneja en la cuenta
            $table->date('fecha_vencimiento')->nullable(); // es la fecha en la que vence la cuenta
            $table->string('prima')->nullable(); //es la prima que da el cliente
            $table->integer('total_pagos')->nullable(); //es la cuota que tiene que dar el cliente
            $table->integer('estado_interes')->nullable();//si esta activo o incativo el interes en la cuenta
            $table->string('total_intereses')->nullable();//es el total de interes que tiene la cuenta
            $table->integer('estado_cuenta');//si esta cancelada, en mora, o vida normal
            $table->string('descripcion')->nullable();
            $table->foreign('salida_id')->references('id')->on('salidas');
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
        Schema::dropIfExists('cuentas');
    }
}
