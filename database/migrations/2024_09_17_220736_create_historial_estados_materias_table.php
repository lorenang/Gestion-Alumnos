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
            // FK con RegistroEstadosMaterias
            $table->foreignId('registroEstadoMateria_id')->constrained('RegistroEstadosMaterias');
            // FK con EstadosMaterias
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
        Schema::dropIfExists('historial_estados_materias');
    }
};
