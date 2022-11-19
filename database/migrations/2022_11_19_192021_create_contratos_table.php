<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('con_id');
            $table->string('con_nome', 255);
            $table->foreign('con_fk_emp_id')->references('emp_id')->on('empresas');
            $table->timestamp('con_data_inicio_servico');
            $table->timestamp('con_data_fim_servico');
            $table->timestamp('con_criado_em');
            $table->timestamp('con_atualizado_em');
            $table->foreign('con_fk_par_id')->references('par_id')->on('paralizacoes');
            $table->integer('con_enum_tipo_contrato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
