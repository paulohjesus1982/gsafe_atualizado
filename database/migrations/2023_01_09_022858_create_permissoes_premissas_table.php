<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesPremissasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes_premissas', function (Blueprint $table) {
            $table->id('ppre_id');

            $table->bigInteger('ppre_fk_per_id');
            $table->foreign('ppre_fk_per_id')->references('per_id')->on('permissoes');

            $table->bigInteger('ppre_fk_pre_id');
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
        Schema::dropIfExists('permissoes_premissas');
    }
}
