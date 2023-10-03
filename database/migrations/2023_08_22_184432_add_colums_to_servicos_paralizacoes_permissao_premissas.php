<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToServicosParalizacoesPermissaoPremissas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos_paralizacoes_permissao_premissas', function (Blueprint $table) {
            $table->bigInteger('spppre_criado_por')->nullable();
            $table->foreign('spppre_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('spppre_criado_em')->nullable();

            $table->bigInteger('spppre_atualizado_por')->nullable();
            $table->foreign('spppre_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('spppre_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos_paralizacoes_permissao_premissas', function (Blueprint $table) {
            $table->dropForeign(['spppre_criado_por']);
            $table->dropColumn('spppre_criado_por');

            $table->dropColumn('spppre_criado_em');

            $table->dropForeign(['spppre_atualizado_por']);
            $table->dropColumn('spppre_atualizado_por');

            $table->dropColumn('spppre_atualizado_em');
        });
    }
}
