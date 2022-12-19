<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumParalizacoesPremissas extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('paralizacoes_premissas', function (Blueprint $table) {
            $table->text('ppre_caminho_anexo');
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
