<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToContratosServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos_servicos', function (Blueprint $table) {
            $table->bigInteger('cser_criado_por')->nullable();
            $table->foreign('cser_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('cser_criado_em')->nullable();

            $table->bigInteger('cser_atualizado_por')->nullable();
            $table->foreign('cser_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('cser_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos_servicos', function (Blueprint $table) {
            $table->dropForeign(['cser_criado_por']);
            $table->dropColumn('cser_criado_por');

            $table->dropColumn('cser_criado_em');

            $table->dropForeign(['cser_atualizado_por']);
            $table->dropColumn('cser_atualizado_por');

            $table->dropColumn('cser_atualizado_em');
        });
    }
}
