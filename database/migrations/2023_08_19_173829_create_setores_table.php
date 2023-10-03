<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores', function (Blueprint $table) {
            $table->id('set_id');

            $table->string('set_nome', 255);

            $table->bigInteger('set_fk_emp_id_pertencente');
            $table->foreign('set_fk_emp_id_pertencente')->references('emp_id')->on('empresas');

            $table->bigInteger('set_criado_por');
            $table->foreign('set_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('set_criado_em');

            $table->bigInteger('set_atualizado_por')->nullable();
            $table->foreign('set_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('set_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setores');
    }
}
