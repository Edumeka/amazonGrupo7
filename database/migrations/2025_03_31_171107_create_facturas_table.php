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
        Schema::create('facturas', function (Blueprint $table) {
            $table->integer('CODIGO_FACTURA')->primary()->autoIncrement()->comment('Código de la factura');
            $table->integer('CODIGO_PEDIDO')->comment('Código del pedido');
            $table->integer('CODIGO_COMPRADOR')->comment('Código del cliente');
            $table->integer('CODIGO_METODO_PAGO')->comment('Código del método de pago');
            $table->string('NUMERO_FACTURA', 100)->comment('Número de la factura');
            $table->dateTime('FECHA_EMISION')->comment('Fecha de la factura');
            $table->decimal('SUBTOTAL', 10, 2)->comment('Subtotal de la factura');
            $table->decimal('ISV', 10, 2)->comment('ISV de la factura');            
            $table->decimal('TOTAL', 10, 2)->comment('Total de la factura');
            $table->string('TOTAL_EN_LETRAS', 255)->comment('Total en letras de la factura');

            // Foreign keys
            $table->foreign('CODIGO_PEDIDO')->references('CODIGO_PEDIDO')->on('pedidos')->onDelete('cascade');
            $table->foreign('CODIGO_COMPRADOR')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('CODIGO_METODO_PAGO')->references('CODIGO_METODO_PAGO')->on('metodos_pagos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
