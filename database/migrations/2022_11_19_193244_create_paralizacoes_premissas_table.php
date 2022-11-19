<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalizacoesPremissasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paralizacoes_premissas', function (Blueprint $table) {
            $table->bigInteger('ppre_fk_par_id');
            $table->bigInteger('ppre_fk_pre_id');
            $table->foreign('ppre_fk_par_id')->references('par_id')->on('paralizacoes');
            $table->foreign('ppre_fk_pre_id')->references('pre_id')->on('premissas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paralizacoes_premissas');
    }
}
