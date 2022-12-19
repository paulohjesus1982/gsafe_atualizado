<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipes', function (Blueprint $table) {
            $table->id('equ_id');
            $table->string('equ_nome', 255);
            $table->timestamp('equ_criado_em');
            $table->timestamp('equ_atualizado_em');
            $table->bigInteger('equ_fk_usu_id_atualizou');
            $table->foreign('equ_fk_usu_id_atualizou')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipes');
    }
}
