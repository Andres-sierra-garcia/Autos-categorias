<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('marca');
            $table->string('modelo');
            $table->timestamps();

            $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
