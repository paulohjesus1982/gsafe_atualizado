<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_historico', function (Blueprint $table) {
            $table->id('chis_id');
            $table->foreign('chis_fk_con_id')->references('con_id')->on('contratos');
            $table->string('chis_campo_trocado', 255);
            $table->text('chis_valor_anterior');
            $table->text('chis_valor_atualizado');
            $table->timestamps('chis_cadastrado_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_historico');
    }
}
