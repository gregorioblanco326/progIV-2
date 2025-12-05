<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_falla');
            $table->text('descripcion_falla');
            $table->string('equipo_afectado'); // ID o nombre de la computadora
            $table->enum('prioridad', ['baja', 'media', 'alta'])->default('media');
            $table->enum('estado', ['abierto', 'en_proceso', 'cerrado'])->default('abierto');
            $table->timestamp('fecha_reporte');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
