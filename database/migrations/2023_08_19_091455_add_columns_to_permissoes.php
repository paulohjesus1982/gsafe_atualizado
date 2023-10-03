<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissoes', function (Blueprint $table) {
            $table->bigInteger('per_criado_por')->nullable();
            $table->foreign('per_criado_por')->references('usu_id')->on('usuarios');

            $table->bigInteger('per_atualizado_por')->nullable();
            $table->foreign('per_atualizado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissoes', function (Blueprint $table) {
            $table->dropForeign(['per_criado_por']);
            $table->dropColumn('per_criado_por');

            $table->dropForeign(['per_atualizado_por']);
            $table->dropColumn('per_atualizado_por');
        });
    }
}
