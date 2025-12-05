<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('nombre_completo')->nullable();
            $table->string('direccion_linea1')->nullable();
            $table->string('direccion_linea2')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('biografia')->nullable();
            $table->string('url_web')->nullable();
            $table->string('url_avatar')->nullable();
            $table->timestamps();

            // Un usuario solo puede tener un perfil
            $table->unique('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
