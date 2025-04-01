<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->id()->comment('Código del usuario');

            $table->string('email')->unique()->comment('Correo electrónico del usuario');
            $table->dateTime('email_verified_at')->nullable()->comment('Fecha de verificación del correo electrónico');
            $table->string('password')->comment('Contraseña del usuario');
            $table->rememberToken()->comment('Token de recordatorio de sesión');
            $table->string('NOMBRE', 255)->comment('Nombre del usuario');
            $table->string('APELLIDO', 255)->comment('Apellido del usuario');
            $table->string('TELEFONO', 20)->comment('Teléfono del usuario');
            $table->date('FECHA_NACIMIENTO')->comment('Fecha de nacimiento del usuario');
            $table->date('FECHA_CREACION')->default(DB::raw('CURRENT_DATE'))->comment('Fecha de creación del usuario');
            $table->string('FOTO', 255)->nullable()->comment('Ruta de la foto de perfil del usuario');

            // Clave foránea
            $table->integer('CODIGO_ESTADO')->comment('Código del estado del usuario');
            $table->integer('CODIGO_GENERO')->comment('Código del género del usuario');
            $table->integer('CODIGO_ROL')->comment('Código del rol del usuario');
            $table->integer('CODIGO_DIRECCION')->comment('Código de la dirección del usuario');

            // Clave foráneas que referencian a otras tablas
            $table->foreign('CODIGO_ESTADO')->references('CODIGO_ESTADO')->on('estados')->onDelete('cascade');
            $table->foreign('CODIGO_GENERO')->references('CODIGO_GENERO')->on('generos')->onDelete('cascade');
            $table->foreign('CODIGO_ROL')->references('CODIGO_ROL')->on('roles')->onDelete('cascade');
            $table->foreign('CODIGO_DIRECCION')->references('CODIGO_DIRECCION')->on('direcciones')->onDelete('cascade');

        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary()->comment('Correo electrónico del usuario');
            $table->string('token')->comment('Token de restablecimiento de contraseña');
            $table->timestamp('created_at')->nullable()->comment('Fecha de creación del token');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->comment('ID de la sesión');
            $table->foreignId('user_id')->nullable()->index()->comment('ID del usuario');
            $table->string('ip_address', 45)->nullable()->comment('Dirección IP del usuario');
            $table->text('user_agent')->nullable()->comment('Agente de usuario del navegador');
        $table->longText('payload')->comment('Carga útil de la sesión');
            $table->integer('last_activity')->index()->comment('Última actividad de la sesión');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
