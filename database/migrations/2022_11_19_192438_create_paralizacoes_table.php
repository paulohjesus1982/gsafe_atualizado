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
            $table->text('par_justificativa');
            $table->text('par_observacao');
            $table->integer('par_enum_estado_paralizacao');
            $table->bigInteger('par_fk_emp_id');
            $table->foreign('par_fk_emp_id')->references('emp_id')->on('empresas');
            $table->integer('par_art');
            $table->integer('par_pet');
            $table->text('par_caminho_anexo');
            $table->bigInteger('par_fk_per_id');
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
