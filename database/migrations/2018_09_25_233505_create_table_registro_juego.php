<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegistroJuego extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_juego',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('participante_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->unsignedBigInteger('respuesta_id')->nullable();
            $table->integer('orden');
            $table->timestamps();
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('respuesta_id')->references('id')->on('respuestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_juego');
    }
}
