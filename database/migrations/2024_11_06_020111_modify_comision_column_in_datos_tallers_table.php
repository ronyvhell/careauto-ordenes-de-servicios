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
            $table->decimal('comision', 10, 2)->change(); // Aumenta el tamaño permitido para la columna `comision`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datos_tallers', function (Blueprint $table) {
            $table->decimal('comision', 5, 2)->change(); // Vuelve a la definición original en caso de deshacer la migración
        });
    }
};
