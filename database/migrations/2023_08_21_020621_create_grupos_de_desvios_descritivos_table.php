<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposDeDesviosDescritivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_de_desvios_descritivos', function (Blueprint $table) {
            $table->id('gddesvdesc_id');

            $table->bigInteger('gddesvdesc_fk_per_id');
            $table->foreign('gddesvdesc_fk_per_id')->references('per_id')->on('permissoes');

            $table->bigInteger('gddesvdesc_fk_pre_id');
            $table->foreign('gddesvdesc_fk_pre_id')->references('pre_id')->on('premissas');

            $table->bigInteger('gddesvdesc_criado_por');
            $table->foreign('gddesvdesc_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesvdesc_criado_em');

            $table->bigInteger('gddesvdesc_atualizado_por')->nullable();
            $table->foreign('gddesvdesc_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('gddesvdesc_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_de_desvios_descritivos');
    }
}
