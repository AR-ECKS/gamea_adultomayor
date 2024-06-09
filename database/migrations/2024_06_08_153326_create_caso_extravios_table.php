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
        Schema::create('caso_extravios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->date('fecha')->nullable();
            $table->string('otros', 250)->nullable();
            $table->string('ruta_imagen', 250)->nullable();
            $table->unsignedBigInteger('adultomayor_id');
            #$table->foreign('adultomayor_id')->references('id')->on('adulto_mayors')->onUpdate('cascade')->onDelete('cascade');
            # posiblemente cambiar el incremente por id
            $table->enum('estado', [0, 1])->default(1)
                ->comment('Se refiere a que si el estado es 1 signmifica activo, 0 significa que ya se encontro al adulto mayor.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caso_extravios');
    }
};
