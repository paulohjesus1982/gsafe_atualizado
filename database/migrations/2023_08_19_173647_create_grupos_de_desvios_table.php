<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposDeDesviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_de_desvios', function (Blueprint $table) {
            $table->id('gddesv_id');

            $table->string('gddesv_nome', 255);
            $table->string('gddesv_rgb', 255);

            $table->bigInteger('gddesv_criado_por');
            $table->foreign('gddesv_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesv_criado_em');

            $table->bigInteger('gddesv_atualizado_por')->nullable();
            $table->foreign('gddesv_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesv_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_de_desvios');
    }
}
