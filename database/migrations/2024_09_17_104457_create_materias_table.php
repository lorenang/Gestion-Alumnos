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
        Schema::create('Materias', function (Blueprint $table) {
            $table->id('materia_id');
            $table->string('materia_nombre', 150);
            $table->integer('materia_horasCursado');
            $table->string('materia_duracion');
            $table->string('usuario', 100);
            // FK con Carreras
            $table->foreignId('carrera_id')->constrained('Carreras', 'carrera_id');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Materias');
    }
};
