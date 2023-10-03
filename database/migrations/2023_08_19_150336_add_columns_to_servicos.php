<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->bigInteger('ser_criado_por')->nullable();
            $table->foreign('ser_criado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('ser_atualizado_por')->nullable();
            $table->foreign('ser_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropForeign(['ser_criado_por']);
            $table->dropColumn('ser_criado_por');

            $table->dropForeign(['ser_atualizado_por']);
            $table->dropColumn('ser_atualizado_por');
        });
    }
}
