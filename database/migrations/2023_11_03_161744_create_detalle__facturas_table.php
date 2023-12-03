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
        Schema::create('detalle__facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->constrained('facturas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('cantidad',false,true);
            $table->float('precio');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__facturas');
    }
};
