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
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('CODIGO_PRODUCTO')->primary()->autoIncrement()->comment('Código del producto');
            $table->string('PRODUCTO', 255)->comment('Nombre del producto');
            $table->string('DESCRIPCION', 255)->comment('Descripción del producto');
            $table->integer('PRECIO')->comment('Precio del producto');
            $table->integer('CODIGO_CATEGORIA')->comment('Código de la categoría');
            $table->integer('STOCK')->comment('Cantidad de productos en stock');
            $table->integer('CODIGO_VENDEDOR')->comment('Código del vendedor');
            $table->date('FECHA_CREACION')->default(DB::raw('CURRENT_DATE'))->comment('Fecha de creación del producto');
            $table->string('IMAGEN', 255)->comment('URL de la imagen del producto');
            $table->string('PALABRAS_CLAVES', 255)->comment('Palabras claves del producto');

            // Llaves foraneas
            $table->foreign('CODIGO_CATEGORIA')->references('CODIGO_CATEGORIA')->on('categorias')->onDelete('cascade');
            $table->foreign('CODIGO_VENDEDOR')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
