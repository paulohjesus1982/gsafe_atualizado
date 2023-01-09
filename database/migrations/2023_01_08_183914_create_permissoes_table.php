<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->id('per_id');
            $table->string('per_nome', 255);
            $table->string('per_rgb', 255);
            $table->timestamp('per_criado_em');
            $table->timestamp('per_atualizado_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permissoes');
    }
}
