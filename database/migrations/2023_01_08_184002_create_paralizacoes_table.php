<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalizacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paralizacoes', function (Blueprint $table) {
            $table->id('par_id');

            $table->integer('par_enum_estado_paralizacao');

            $table->bigInteger('par_fk_emp_id');
            $table->foreign('par_fk_emp_id')->references('emp_id')->on('empresas');

            $table->integer('par_art')->nullable();
            $table->text('par_art_img')->nullable();

            $table->integer('par_pet')->nullable();
            $table->text('par_pet_img')->nullable();

            $table->timestamp('par_criado_em');

            $table->timestamp('par_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paralizacoes');
    }
}
