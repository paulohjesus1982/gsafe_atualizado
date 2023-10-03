<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosDesviosGruposDeDesviosDescritivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_desvios_grupos_de_desvios_descritivos', function (Blueprint $table) {
            $table->id('sdgddd_id');

            $table->bigInteger('sdgddd_fk_ser_id');
            $table->foreign('sdgddd_fk_ser_id')->references('ser_id')->on('servicos');

            $table->bigInteger('sdgddd_fk_des_id');
            $table->foreign('sdgddd_fk_des_id')->references('des_id')->on('desvios');

            $table->bigInteger('sdgddd_fk_gddesv_id');
            $table->foreign('sdgddd_fk_gddesv_id')->references('gddesv_id')->on('grupos_de_desvios');

            $table->bigInteger('sdgddd_fk_gddesc_id');
            $table->foreign('sdgddd_fk_gddesc_id')->references('gddesc_id')->on('grupos_de_descritivos');

            $table->bigInteger('sdgddd_criado_por');
            $table->foreign('sdgddd_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('sdgddd_criado_em');

            $table->bigInteger('sdgddd_atualizado_por')->nullable();
            $table->foreign('sdgddd_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('sdgddd_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos_desvios_grupos_de_desvios_descritivos');
    }
}
