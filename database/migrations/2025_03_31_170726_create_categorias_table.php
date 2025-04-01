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
        Schema::create('categorias', function (Blueprint $table) {
            $table->integer('CODIGO_CATEGORIA')->primary()->autoIncrement()->comment('Código de la categoría');
            $table->string('CATEGORIA', 100)->comment('Categoría del producto');
            $table->string('DESCRIPCION', 255)->comment('Descripción de la categoría');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
