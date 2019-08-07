<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('pregunta');
            $table->integer('dificultad');
            $table->string('docente');
            $table->unsignedBigInteger('asignatura_id');
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
