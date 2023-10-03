<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToEquipesMembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipes_membros', function (Blueprint $table) {
            $table->bigInteger('emem_criado_por')->nullable();
            $table->foreign('emem_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('emem_criado_em')->nullable();

            $table->bigInteger('emem_atualizado_por')->nullable();
            $table->foreign('emem_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('emem_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes_membros', function (Blueprint $table) {
            $table->dropForeign(['emem_criado_por']);
            $table->dropColumn('emem_criado_por');

            $table->dropColumn('emem_criado_em');

            $table->dropForeign(['emem_atualizado_por']);
            $table->dropColumn('emem_atualizado_por');

            $table->dropColumn('emem_atualizado_em');
        });
    }
}
