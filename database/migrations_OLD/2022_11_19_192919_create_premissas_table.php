<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremissasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('premissas', function (Blueprint $table) {
            $table->id('pre_id');
            $table->bigInteger('pre_fk_per_id');
            $table->foreign('pre_fk_per_id')->references('per_id')->on('permissoes');
            $table->string('pre_nome', 255);
            $table->string('pre_descricao', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permissas');
    }
}
