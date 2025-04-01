<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('CODIGO_PEDIDO')->primary()->autoIncrement()->comment('Código del pedido');
            $table->integer('CODIGO_COMPRADOR')->comment('Código del comprador');
            $table->integer('CODIGO_METODO_PAGO')->comment('Código del método de pago');
            $table->integer('CODIGO_ESTADO')->comment('Código del estado');
            $table->dateTime('FECHA_PEDIDO')->comment('Fecha del pedido');
            $table->decimal('TOTAL', 10, 2)->comment('Total del pedido');
            $table->dateTime('FECHA_ENVIO')->nullable()->comment('Fecha de envío del pedido');
            $table->dateTime('FECHA_ENTREGA')->nullable()->comment('Fecha de entrega del pedido');


           $table->foreign('CODIGO_COMPRADOR')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('CODIGO_METODO_PAGO')->references('CODIGO_METODO_PAGO')->on('metodos_pagos')->onDelete('cascade');
            $table->foreign('CODIGO_ESTADO')->references('CODIGO_ESTADO')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
