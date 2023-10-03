<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesMembrosHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipes_membros_historico', function (Blueprint $table) {
            $table->id('emhis_id');

            $table->text('emhis_acao_efetuada');

            $table->bigInteger('emhis_fk_usu_id');
            $table->foreign('emhis_fk_usu_id')->references('usu_id')->on('usuarios');

            $table->bigInteger('emhis_fk_equ_id');
            $table->foreign('emhis_fk_equ_id')->references('equ_id')->on('equipes');

            $table->bigInteger('emhis_fk_usu_id_criou');
            $table->foreign('emhis_fk_usu_id_criou')->references('usu_id')->on('usuarios');

            $table->timestamp('emhis_criado_em');

            $table->bigInteger('emhis_fk_usu_id_alterou')->nullable();
            $table->foreign('emhis_fk_usu_id_alterou')->references('usu_id')->on('usuarios');

            $table->timestamp('emhis_alterado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipes_membros_historico');
    }
}
