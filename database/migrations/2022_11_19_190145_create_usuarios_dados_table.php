<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_dados', function (Blueprint $table) {
            $table->id('udad_id');
            $table->text('udad_nome_completo');
            $table->text('udad_endereco');
            $table->text('udad_numero');
            $table->text('udad_cep');
            $table->text('udad_cidade');
            $table->text('udad_bairro');
            $table->text('udad_estado');
            $table->text('udad_telefone_principal');
            $table->text('udad_telefone_contato');
            $table->text('udad_registro_profissao');
            $table->timestamp('udad_criado_em');
            $table->timestamp('udad_atualizado_em');
            $table->foreign('udad_fk_usu_id')->references('usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_dados');
    }
}
