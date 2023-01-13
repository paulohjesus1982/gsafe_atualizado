<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesParalizacoesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permissoes_paralizacoes', function (Blueprint $table) {
            $table->id('ppar_id');
            $table->bigInteger('ppar_fk_par_id');
            $table->foreign('ppar_fk_par_id')->references('par_id')->on('paralizacoes');
            $table->bigInteger('ppar_fk_per_id');
            $table->foreign('ppar_fk_per_id')->references('per_id')->on('permissoes');
            $table->text('ppar_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permissoes_paralizacoes');
    }
}
