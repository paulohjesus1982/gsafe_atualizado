<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoHistoricoTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contrato_historico', function (Blueprint $table) {
            $table->id('chis_id');
            $table->bigInteger('chis_fk_con_id');
            $table->foreign('chis_fk_con_id')->references('con_id')->on('contratos');
            $table->string('chis_campo_trocado', 255);
            $table->text('chis_valor_anterior');
            $table->text('chis_valor_atualizado');

            $table->timestamp('chis_cadastrado_em');
            $table->bigInteger('chis_criado_por');
            $table->foreign('chis_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('chis_atualizado_em')->nullable();
            $table->bigInteger('chis_atualizado_por')->nullable();
            $table->foreign('chis_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contrato_historico');
    }
}
