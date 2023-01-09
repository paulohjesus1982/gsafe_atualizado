<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipesMembrosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('equipes_membros', function (Blueprint $table) {
            $table->id('emem_id');
            $table->bigInteger('emem_fk_usu_id');
            $table->foreign('emem_fk_usu_id')->references('usu_id')->on('usuarios');
            $table->bigInteger('emem_fk_equ_id');
            $table->foreign('emem_fk_equ_id')->references('equ_id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('equipes_membros');
    }
}
