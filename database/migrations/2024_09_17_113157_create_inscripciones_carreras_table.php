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
        Schema::create('InscripcionesCarreras', function (Blueprint $table) {
            $table->id('inscripcionCarrera_id');
            $table->string('inscripcionCarrera_legajo');
            $table->string('inscripcionCarrera_estado');
            $table->string('usuario', 100);
            // FK con Carreras
            $table->foreignId('carrera_id')->constrained('Carreras');
            // FK con Alumnos
            $table->foreignId('alumno_id')->constrained('Alumnos');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('InscripcionesCarreras');
    }
};
