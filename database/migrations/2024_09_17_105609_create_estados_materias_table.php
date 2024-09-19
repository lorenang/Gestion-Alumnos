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
        Schema::create('EstadosMaterias', function (Blueprint $table) {
            $table->id('estadoMateria_id');
            $table->string('estadoMateria_estado');
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
        Schema::dropIfExists('EstadosMaterias');
    }
};
