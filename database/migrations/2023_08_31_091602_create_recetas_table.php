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
       //Cumple la funcion del constructor, laravel por medio de composer y el terminal crean la tabla en la base de datos.
        //php artisan migrate (migrate tiene mas funciones)
        Schema::create('recetas', function (Blueprint $table) {
            $table->engine="InnoDb";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('instrucion');
            $table->string('ingrediente_id');
            $table->integer('tiempo');
            $table->bigInteger('dificultad_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('foto');

            $table->foreign('dificultad_id')->references('id')->on('dificultades')->onDelete("cascade");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
