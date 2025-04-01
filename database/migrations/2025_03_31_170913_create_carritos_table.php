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
        Schema::create('carritos', function (Blueprint $table) {
            // Definición de la tabla 'carritos'
            $table->integer('CODIGO_CARRITO')->primary()->autoIncrement()->comment('Código del carrito');
            $table->integer('CODIGO_COMPRADOR')->comment('Código del usuario');
            $table->integer('CODIGO_PRODUCTO')->comment('Código del producto');
            $table->integer('CANTIDAD')->comment('Cantidad del producto en el carrito');

            // Definición de las claves foráneas
           $table->foreign('CODIGO_COMPRADOR')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('CODIGO_PRODUCTO')->references('CODIGO_PRODUCTO')->on('productos')->onDelete('cascade');       
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};
