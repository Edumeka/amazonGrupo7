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
        Schema::create('pagos', function (Blueprint $table) {
            $table->integer('CODIGO_PAGO')->primary()->autoIncrement()->comment('Código del pago');
            $table->integer('CODIGO_METODO_PAGO')->comment('Código del método de pago');
            $table->integer('CODIGO_COMPRADOR')->comment('Código del usuario');
            $table->decimal('MONTO_PAGADO', 10, 2)->comment('Monto del pago');
            $table->dateTime('FECHA_PAGO')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Fecha y hora del pago');

            // Foreign keys
            $table->foreign('CODIGO_METODO_PAGO')->references('CODIGO_METODO_PAGO')->on('metodos_pagos');

           $table->foreign('CODIGO_COMPRADOR')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
