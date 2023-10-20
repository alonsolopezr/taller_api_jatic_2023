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
        Schema::create('conferencias', function (Blueprint $table)
        {
            $table->id();
            $table->string('ponente', 150);
            $table->string('titulo', 200);
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->string('lugar', 150);
            $table->time('hora');
            $table->integer('capacidad_asistentes')->default(10);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferencias');
    }
};
