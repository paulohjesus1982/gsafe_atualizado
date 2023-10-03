<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usu_id');

            $table->string('usu_nome', 255);

            $table->string('usu_email', 255)->unique();
            $table->string('usu_senha', 255);

            $table->timestamp('usu_criado_em');

            $table->timestamp('usu_atualizado_em')->nullable();

            $table->integer('usu_tipo_usuario')->default(2);

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
