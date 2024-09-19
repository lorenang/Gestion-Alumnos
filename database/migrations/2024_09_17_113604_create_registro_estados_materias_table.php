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
            // Registro de la nota. Si la nota tiene decimales con precisión, mejor usar decimal.
            $table->decimal('materia_nota', 5, 2)->nullable(); // hasta 999.99 de nota
            //FK con Alumnos
            $table->foreignId('alumno_id')->constrained('Alumnos', 'alumno_id');
            //FK con Materias
            $table->foreignId('materia_id')->constrained('Materias', 'materia_id');
            //FK con EstadosMaterias
            $table->foreignId('estadoMateria_id')->constrained('EstadosMaterias', 'estadoMateria_id');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RegistroEstadosMaterias');
    }
};
