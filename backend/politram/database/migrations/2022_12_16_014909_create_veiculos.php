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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo',250);
            $table->string('marca',250);
            $table->string('placa',7);
            $table->string('cor',100);
            $table->integer('quilometragem');
            $table->foreignId('tipos_veiculo_id')->references('id')->on('tipos_veiculo');
            $table->smallInteger('ano')->check('ano >= 0000 AND ano <= 9999');
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
        Schema::dropIfExists('veiculos');
    }
};
