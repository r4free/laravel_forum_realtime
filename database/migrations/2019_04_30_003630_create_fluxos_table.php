<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFluxosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluxos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('departamento_id');
//            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedInteger('assunto_id');
//            $table->foreign('assunto_id')->references('id')->on('assuntos');

            $table->unsignedInteger('fechamento_id');
//            $table->foreign('fechamento_id')->references('id')->on('fechamentos');

            $table->unsignedInteger('execucao_id');
//            $table->foreign('execucao_id')->references('id')->on('execucoes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fluxos');
    }
}
