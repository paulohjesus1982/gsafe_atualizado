<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdicionalContratosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('adicional_contratos', function (Blueprint $table) {
            $table->id('acon_id');

            $table->bigInteger('acon_fk_con_codigo_contrato_principal');
            $table->foreign('acon_fk_con_codigo_contrato_principal')->references('con_id')->on('contratos');

            $table->bigInteger('acon_fk_con_codigo_contrato_adicional');
            $table->foreign('acon_fk_con_codigo_contrato_adicional')->references('con_id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('adicional_contratos');
    }
}
