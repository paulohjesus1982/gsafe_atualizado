<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalizacoesContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paralizacoes_contratos', function (Blueprint $table) {
            $table->foreign('pcon_fk_par_id')->references('par_id')->on('paralizacoes');
            $table->foreign('pcon_fk_con_id')->references('con_id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paralizacoes_contratos');
    }
}
