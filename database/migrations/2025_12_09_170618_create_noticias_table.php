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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titular');
            $table->string('cuerpo');
            $table->enum('calificacion', ['urgente', 'evento', 'informacion', 'aviso']);
            $table->timestamp('fecha');

            $table->foreignId('municipio_id');
            $table->unsignedBigInteger('creador_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
