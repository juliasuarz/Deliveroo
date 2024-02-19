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
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rest');
            $table->text('descripcion_rest');
            $table->enum('tipo_usu', ['Admin', 'Gerente', 'Estandar']);
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
        Schema::dropIfExists('restaurantes');
    }
};
