<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta', function (Blueprint $table) {
            $table->id();
            $table->integer('cpf_id');
            $table->integer('instituicao_id');
            $table->integer('modalidade_id');
            $table->integer('qntParcelaMin');
            $table->integer('qntParcelaMax');
            $table->double('valorMin');
            $table->double('valorMax');
            $table->double('jurosMes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta');
    }
};
