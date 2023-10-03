<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToParalizacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paralizacoes', function (Blueprint $table) {
            $table->bigInteger('par_criado_por')->nullable();
            $table->foreign('par_criado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('par_atualizado_por')->nullable();
            $table->foreign('par_atualizado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('par_dono_atual')->nullable();
            $table->foreign('par_dono_atual')->references('usu_id')->on('usuarios');

            $table->timestamp('par_transferido_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paralizacoes', function (Blueprint $table) {
            $table->dropForeign(['par_criado_por']);
            $table->dropColumn('par_criado_por');

            $table->dropForeign(['par_atualizado_por']);
            $table->dropColumn('par_atualizado_por');

            $table->dropForeign(['par_dono_atual']);
            $table->dropColumn('par_dono_atual');

            $table->dropColumn('par_transferido_em');
        });
    }
}
