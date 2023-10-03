<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsUsuariosDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios_dados', function (Blueprint $table) {
            $table->bigInteger('udad_atualizado_por')->nullable();
            $table->foreign('udad_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_dados', function (Blueprint $table) {
            $table->dropForeign(['udad_atualizado_por']);
            $table->dropColumn('udad_atualizado_por');
        });
    }
}
