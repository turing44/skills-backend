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
        Schema::create('inscripciones_eventos', function (Blueprint $table) {
            $table->id();

            $table->timestamp('fecha_alta')->useCurrent();
            $table->timestamp('fecha_baja')->nullable();

            $table->foreignId('evento_id');
            $table->foreignId('user_id');

            $table->unique(['evento_id', 'user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones_eventos');
    }
};
