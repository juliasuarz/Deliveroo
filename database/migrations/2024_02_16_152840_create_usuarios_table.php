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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usu');
            $table->string('nombre_usu');
            $table->string('apellidos_usu');
            $table->string('email_usu')->unique();
            $table->enum('tipo_usu', ['Admin', 'Gerente', 'Estandar', 'Repartidor']);
            $table->string('pwd_usu');
            $table->string('telf_usu')->nullable();
            $table->unsignedBigInteger('id_restaurante')->nullable();
            $table->foreign('id_restaurante')->references('id_restaurante')->on('restaurantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
