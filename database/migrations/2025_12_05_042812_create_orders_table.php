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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('monto_total', 10, 2);
            $table->enum('estado', ['pendiente', 'procesando', 'enviado', 'completado', 'cancelado'])->default('pendiente');
            $table->string('metodo_pago')->nullable();
            $table->text('notas_cliente')->nullable();
            $table->string('direccion_envio');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
