<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosParalizacoesPermissaoPremissasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_paralizacoes_permissao_premissas', function (Blueprint $table) {
            $table->id('spppre_id');

            $table->bigInteger('spppre_fk_par_id');
            $table->foreign('spppre_fk_par_id')->references('par_id')->on('paralizacoes');

            $table->bigInteger('spppre_fk_ser_id');
            $table->foreign('spppre_fk_ser_id')->references('ser_id')->on('servicos');

            $table->bigInteger('spppre_fk_per_id');
            $table->foreign('spppre_fk_per_id')->references('per_id')->on('permissoes');

            $table->bigInteger('spppre_fk_pre_id');
            $table->foreign('spppre_fk_pre_id')->references('pre_id')->on('premissas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos_paralizacoes_permissao_premissas');
    }
}
