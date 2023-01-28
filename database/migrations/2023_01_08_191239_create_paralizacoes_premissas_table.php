<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParalizacoesPremissasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paralizacoes_premissas', function (Blueprint $table) {
            $table->id('ppre_id');
            $table->bigInteger('ppre_fk_par_id');
            $table->foreign('ppre_fk_par_id')->references('par_id')->on('paralizacoes');
            $table->bigInteger('ppre_fk_pre_id');
            $table->foreign('ppre_fk_pre_id')->references('pre_id')->on('premissas');
            $table->text('ppre_caminho_anexo')->nullable();
            $table->integer('ppre_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('paralizacoes_premissas');
    }
}
