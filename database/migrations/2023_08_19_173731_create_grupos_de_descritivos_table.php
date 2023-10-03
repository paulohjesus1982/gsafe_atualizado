<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposDeDescritivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_de_descritivos', function (Blueprint $table) {
            $table->id('gddesc_id');

            $table->string('gddesc_nome', 255);
            $table->string('gddesc_descricao', 255);

            $table->bigInteger('gddesc_criado_por');
            $table->foreign('gddesc_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesc_criado_em');

            $table->bigInteger('gddesc_atualizado_por')->nullable();
            $table->foreign('gddesc_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesc_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_de_descritivos');
    }
}
