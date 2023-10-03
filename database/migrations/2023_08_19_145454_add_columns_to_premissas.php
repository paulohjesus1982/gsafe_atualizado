<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPremissas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premissas', function (Blueprint $table) {
            $table->bigInteger('pre_criado_por')->nullable();
            $table->foreign('pre_criado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('pre_atualizado_por')->nullable();
            $table->foreign('pre_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premissas', function (Blueprint $table) {
            $table->dropForeign(['pre_criado_por']);
            $table->dropColumn('pre_criado_por');

            $table->dropForeign(['pre_atualizado_por']);
            $table->dropColumn('pre_atualizado_por');
        });
    }
}
