<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('emp_nome', 255);
            $table->string('emp_cnpj', 14);
            $table->string('emp_razao_social', 255);
            $table->string('emp_contato', 255);
            $table->string('emp_email', 255);
            $table->timestamp('emp_criado_em');
            $table->timestamp('emp_atualizado_em')->nullable();
            $table->integer('emp_enum_tipo_empresa');
            $table->bigInteger('emp_fk_usu_id_atualizou')->nullable();
            $table->foreign('emp_fk_usu_id_atualizou')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('empresas');
    }
}
