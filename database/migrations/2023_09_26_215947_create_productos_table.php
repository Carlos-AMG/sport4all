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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('existencia');
            $table->float('precio');
            $table->text('descripcion');
            $table->string('imagen');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('marca_id'); // Nueva columna para la marca
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('marca_id')->references('id')->on('marcas'); // Clave foránea para la marca

            $table->softDeletes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
