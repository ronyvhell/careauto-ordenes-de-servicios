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
        Schema::table('datos_tallers', function (Blueprint $table) {
            $table->timestamps(); // Esto agregará created_at y updated_at a la tabla existente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_tallers', function (Blueprint $table) {
            $table->dropTimestamps(); // Elimina las columnas created_at y updated_at en caso de revertir la migración
        });
    }
};
