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
        Schema::create('resenias', function (Blueprint $table) {
            $table->integer('CODIGO_RESENIA')->primary()->autoIncrement()->comment('Código de la reseña');
            $table->integer('CODIGO_PRODUCTO')->nullable()->comment('Código del producto');
            $table->integer('CODIGO_VENDEDOR')->nullable()->comment('Código del vendedor');
            $table->integer('CODIGO_PEDIDO')->nullable()->comment('Código del pedido');
            $table->integer('CODIGO_USUARIO')->comment('Código del usuario');
            $table->integer('CALIFICACION')->comment('Calificación del producto');
            $table->string('TEXTO', 500)->comment('Texto de la reseña');
            $table->dateTime('FECHA_CREACION')->default(now())->comment('Fecha de creación de la reseña');

            // Foreign key constraints
            $table->foreign('CODIGO_PRODUCTO')->references('CODIGO_PRODUCTO')->on('productos')->onDelete('cascade');
          $table->foreign('CODIGO_USUARIO')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenias');
    }
};
