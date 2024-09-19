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
        Schema::create('HistorialEstadosMaterias', function (Blueprint $table) {
            $table->id('historialEstadoMateria_id');
            $table->string('usuario', 100);
            // Registro de la nota. Si la nota tiene decimales con precisión, mejor usar decimal.
            $table->decimal('materia_nota', 5, 2)->nullable(); // hasta 999.99 de nota
            // FK con RegistroEstadosMaterias
            $table->foreignId('registroEstadoMateria_id')->constrained('RegistroEstadosMaterias', 'registroEstadoMateria_id');
            // FK con EstadosMaterias
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
        Schema::dropIfExists('HistorialEstadosMaterias');
    }
};
