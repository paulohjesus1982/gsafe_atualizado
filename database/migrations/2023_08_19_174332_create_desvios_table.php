<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desvios', function (Blueprint $table) {
            $table->id('des_id');

            $table->text('des_descricao'); //qual desvio?

            $table->integer('des_enum_tipo_desvio'); //critico ou nao

            $table->text('des_img_desvio_anexo')->nullable();

            $table->bigInteger('des_criado_por');
            $table->foreign('des_criado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('des_criado_em');

            $table->bigInteger('des_atualizado_por')->nullable();
            $table->foreign('des_atualizado_por')->references('usu_id')->on('usuarios');

            $table->timestamp('des_atualizado_em')->nullable();

            $table->bigInteger('des_fk_are_id');
            $table->foreign('des_fk_are_id')->references('are_id')->on('areas');

            $table->bigInteger('des_fk_emp_id');
            $table->foreign('des_fk_emp_id')->references('emp_id')->on('empresas');

            $table->bigInteger('des_fk_set_id');
            $table->foreign('des_fk_set_id')->references('set_id')->on('setores');

            $table->bigInteger('des_fk_gddesv_id');
            $table->foreign('des_fk_gddesv_id')->references('gddesv_id')->on('grupos_de_desvios');

            $table->bigInteger('des_fk_gddesc_id');
            $table->foreign('des_fk_gddesc_id')->references('gddesc_id')->on('grupos_de_descritivos');

            $table->bigInteger('des_fk_ser_id');
            $table->foreign('des_fk_ser_id')->references('ser_id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desvios');
    }
}
