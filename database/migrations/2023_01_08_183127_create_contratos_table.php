<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('con_id');
            $table->string('con_nome', 255);
            $table->bigInteger('con_fk_emp_id');
            $table->foreign('con_fk_emp_id')->references('emp_id')->on('empresas');
            $table->timestamp('con_data_inicio_servico');
            $table->timestamp('con_data_fim_servico');

            $table->timestamp('con_criado_em');
            $table->bigInteger('con_criado_por')->nullable();
            $table->foreign('con_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('con_atualizado_em')->nullable();
            $table->bigInteger('con_atualizado_por')->nullable();
            $table->foreign('con_atualizado_por')->references('usu_id')->on('usuarios');

            $table->integer('con_enum_tipo_contrato')->default(1);
            $table->text('con_status')->default('Ativo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contratos');
    }
}
