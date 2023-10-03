<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremissasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premissas', function (Blueprint $table) {
            $table->id('pre_id');

            $table->string('pre_nome', 255);
            $table->string('pre_descricao', 255);

            $table->timestamp('pre_criado_em');

            $table->timestamp('pre_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premissas');
    }
}
