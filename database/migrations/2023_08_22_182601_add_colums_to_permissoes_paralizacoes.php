<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToPermissoesParalizacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissoes_paralizacoes', function (Blueprint $table) {
            $table->bigInteger('ppar_criado_por')->nullable();
            $table->foreign('ppar_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('ppar_criado_em')->nullable();

            $table->bigInteger('ppar_atualizado_por')->nullable();
            $table->foreign('ppar_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('ppar_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissoes_paralizacoes', function (Blueprint $table) {
            $table->dropForeign(['ppar_criado_por']);
            $table->dropColumn('ppar_criado_por');

            $table->dropColumn('ppar_criado_em');

            $table->dropForeign(['ppar_atualizado_por']);
            $table->dropColumn('ppar_atualizado_por');

            $table->dropColumn('ppar_atualizado_em');
        });
    }
}
