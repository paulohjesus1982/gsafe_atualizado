<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToPermissoesPremissas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissoes_premissas', function (Blueprint $table) {
            $table->bigInteger('ppre_criado_por')->nullable();
            $table->foreign('ppre_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('ppre_criado_em')->nullable();

            $table->bigInteger('ppre_atualizado_por')->nullable();
            $table->foreign('ppre_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('ppre_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissoes_premissas', function (Blueprint $table) {
            $table->dropForeign(['ppre_criado_por']);
            $table->dropColumn('ppre_criado_por');

            $table->dropColumn('ppre_criado_em');

            $table->dropForeign(['ppre_atualizado_por']);
            $table->dropColumn('ppre_atualizado_por');

            $table->dropColumn('ppre_atualizado_em');
        });
    }
}
