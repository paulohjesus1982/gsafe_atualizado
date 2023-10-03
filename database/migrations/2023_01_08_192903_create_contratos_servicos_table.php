<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_servicos', function (Blueprint $table) {
            $table->id('cser_id');

            $table->bigInteger('cser_fk_con_id');
            $table->foreign('cser_fk_con_id')->references('con_id')->on('contratos');

            $table->bigInteger('cser_fk_ser_id');
            $table->foreign('cser_fk_ser_id')->references('ser_id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos_servicos');
    }
}
