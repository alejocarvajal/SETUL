<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('identificacion');
            $table->string('universidad');
            $table->string('opc1');
            $table->string('opc2');
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('test_id');
            $table->timestamps()->useCurrent();
            $table->softDeletes();

            $table->foreign('test_id')->references('id')->on('tests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
}
