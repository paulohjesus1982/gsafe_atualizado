<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalizacoesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paralizacoes', function (Blueprint $table) {
            $table->id('par_id');
            $table->text('par_justificativa');
            $table->text('par_observacao');
            $table->integer('par_enum_estado_paralizacao');

            $table->bigInteger('par_fk_emp_id');
            $table->foreign('par_fk_emp_id')->references('emp_id')->on('empresas');

            $table->bigInteger('par_fk_equ_id');
            $table->foreign('par_fk_equ_id')->references('equ_id')->on('equipes');

            $table->integer('par_art')->nullable();
            $table->integer('par_pet')->nullable();

            $table->timestamp('par_criado_em');
            $table->timestamp('par_atualizado_em')->nullable();
            // $table->text('par_caminho_anexo')->nullable();

            // $table->bigInteger('par_fk_per_id')->nullable();
            // $table->foreign('par_fk_per_id')->references('per_id')->on('permissoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('paralizacoes');
    }
}
