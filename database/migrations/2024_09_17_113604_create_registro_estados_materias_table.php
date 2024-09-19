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
        Schema::create('RegistroEstadosMaterias', function (Blueprint $table) {
            $table->id('registroEstadoMateria_id');
            $table->string('usuario', 100);
            //FK con Alumnos
            $table->foreignId('alumno_id')->constrained('Alumnos');
            //FK con Materias
            $table->foreignId('materia_id')->constrained('Materias');
            //FK con EstadosMaterias
            $table->foreignId('estadoMateria_id')->constrained('EstadosMaterias');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_estados_materias');
    }
};
