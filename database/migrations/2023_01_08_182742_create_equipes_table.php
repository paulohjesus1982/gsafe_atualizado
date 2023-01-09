<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('equipes', function (Blueprint $table) {
            $table->id('equ_id');
            $table->text('equ_nome');
            $table->timestamp('equ_criado_em');
            $table->timestamp('equ_atualizado_em')->nullable();
            $table->bigInteger('equ_fk_usu_id_criado_por')->nullable();
            $table->foreign('equ_fk_usu_id_criado_por')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('equipes');
    }
}
