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
        Schema::create('lugares', function (Blueprint $table) {
            $table->integer('CODIGO_LUGAR')->primary()->autoIncrement()->comment('Código del lugar');
            $table->string('LUGAR', 100);
            $table->integer('CODIGO_LUGAR_SUPERIOR')->nullable()->comment('Código del lugar superior');

            // Clave foránea recursiva
            $table->foreign('CODIGO_LUGAR_SUPERIOR')->references('CODIGO_LUGAR')->on('lugares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares');
    }
};
