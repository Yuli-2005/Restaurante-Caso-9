<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            // Campos cliente Don Miguel
            $table->string('nombre_cliente'); 
            $table->string('telefono'); 
            $table->integer('numero_personas'); 
            $table->date('fecha'); 
            $table->time('hora'); 
            
            // Estado de la reserva: 
            $table->string('estado')->default('confirmada'); 
            
            // Timestamps
            // fecha de cuándo reservaron
            $table->timestamps(); 
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};