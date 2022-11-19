<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipeMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_membros', function (Blueprint $table) {
            $table->id('emem_id');
            $table->foreign('emem_fk_usu_id')->references('usu_id')->on('usuarios');
            $table->foreign('emem_fk_equ_id')->references('equ_id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe_membros');
    }
}
