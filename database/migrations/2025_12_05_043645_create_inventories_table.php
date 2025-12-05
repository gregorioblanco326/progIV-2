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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_articulo')->unique();
            $table->string('codigo_sku')->unique();
            $table->integer('cantidad_stock');
            $table->decimal('precio_costo', 8, 2);
            $table->string('ubicacion')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->timestamp('ultima_entrada');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
