<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColum2ParalizacoesPremissas extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('paralizacoes_premissas', function (Blueprint $table) {
            $table->id('ppre_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('paralizacoes_premissas', function (Blueprint $table) {
            //
        });
    }
}
