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
        Schema::create('Alumnos', function (Blueprint $table) {
            $table->id('alumno_id');
            $table->string('alumno_nombre', 50);
            $table->string('alumno_apellido', 30);
            $table->integer('alumno_dni')->unique();
            $table->string('alumno_telefono', 15);
            $table->string('alumno_correo', 100)->unique();
            $table->enum('alumno_estado', ['ACTIVO', 'INACTIVO'])->default('Activo');
            $table->string('usuario', 100);
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Alumnos');
    }
};
