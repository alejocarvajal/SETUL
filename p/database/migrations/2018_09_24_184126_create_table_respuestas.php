<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('respuesta');
            $table->unsignedBigInteger('pregunta_id');
            $table->integer('correcta');
            $table->integer('estado');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pregunta_id')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
