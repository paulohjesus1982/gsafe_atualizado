<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->bigInteger('usu_criado_por')->nullable();
            $table->foreign('usu_criado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('usu_atualizado_por')->nullable();
            $table->foreign('usu_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['usu_criado_por']);
            $table->dropColumn('usu_criado_por');

            $table->dropForeign(['usu_atualizado_por']);
            $table->dropColumn('usu_atualizado_por');
        });
    }
}
