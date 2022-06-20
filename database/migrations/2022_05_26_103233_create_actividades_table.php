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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->longText('designacao');
            $table->string('coeficiente');
            $table->string('unidade');
            $table->integer('quantidade');
            $table->double('preco_unitario',8,2);
            $table->double('preco_final',8,2);
            $table->foreignId('projecto_id')->references('id')->on('projectos')->onDelete('cascade');
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
        Schema::dropIfExists('actividades');
    }
};
