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
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',250);
            $table->decimal('custo')->default(0);
            $table->dateTime('data_proxima_manutencao');
            $table->dateTime('data_manutencao');
            $table->string('observacao',500);
            $table->foreignId('tipos_servico_id')->references('id')->on('tipos_servico');
            $table->foreignId('veiculos_id')->references('id')->on('veiculos');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencoes');
    }
};
