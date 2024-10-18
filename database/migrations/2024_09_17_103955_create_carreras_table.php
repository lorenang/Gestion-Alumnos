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
        Schema::create('Carreras', function (Blueprint $table) {
            $table->id('carrera_id');
            $table->string('carrera_nombre', 150);
            $table->integer('carrera_duracion');
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
        Schema::dropIfExists('Carreras');
    }
};
