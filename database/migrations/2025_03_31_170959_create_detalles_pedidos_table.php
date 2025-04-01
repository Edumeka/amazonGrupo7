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
        Schema::create('detalles_pedidos', function (Blueprint $table) {
            $table->integer('CODIGO_DETALLE_PEDIDO')->primary()->autoIncrement()->comment('Código del detalle del pedido');
            $table->integer('CODIGO_PEDIDO')->comment('Código del pedido');
            $table->integer('CODIGO_PRODUCTO')->comment('Código del producto');
            $table->integer('CANTIDAD')->comment('Cantidad del producto');
            $table->decimal('PRECIO_UNITARIO', 10, 2)->comment('Precio unitario del producto');
            $table->decimal('SUBTOTAL', 10, 2)->comment('Subtotal del detalle del pedido');
          
            // Llaves foráneas
            $table->foreign('CODIGO_PEDIDO')->references('CODIGO_PEDIDO')->on('pedidos')->onDelete('cascade');
            $table->foreign('CODIGO_PRODUCTO')->references('CODIGO_PRODUCTO')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pedidos');
    }
};
