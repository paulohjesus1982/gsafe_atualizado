<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id('are_id');

            $table->string('are_nome', 255);

            $table->bigInteger('are_criado_por');
            $table->foreign('are_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('are_criado_em');

            $table->bigInteger('are_atualizado_por')->nullable();
            $table->foreign('are_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('are_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
