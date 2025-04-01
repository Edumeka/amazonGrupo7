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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->integer('CODIGO_DIRECCION')->primary()->autoIncrement()->comment('Código de la dirección');
            $table->string('DIRECCION', 255)->comment('Dirección completa');
            $table->integer('CODIGO_LUGAR')->comment('Código del lugar');

            // Clave foránea que referencia a la tabla lugares
            $table->foreign('CODIGO_LUGAR')->references('CODIGO_LUGAR')->on('lugares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
