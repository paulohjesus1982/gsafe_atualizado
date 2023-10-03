<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToAdicionalContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adicional_contratos', function (Blueprint $table) {
            $table->bigInteger('acon_criado_por')->nullable();
            $table->foreign('acon_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('acon_criado_em')->nullable();

            $table->bigInteger('acon_atualizado_por')->nullable();
            $table->foreign('acon_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('acon_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adicional_contratos', function (Blueprint $table) {
            $table->dropForeign(['acon_criado_por']);
            $table->dropColumn('acon_criado_por');

            $table->dropColumn('acon_criado_em');

            $table->dropForeign(['acon_atualizado_por']);
            $table->dropColumn('acon_atualizado_por');

            $table->dropColumn('acon_atualizado_em');
        });
    }
}
