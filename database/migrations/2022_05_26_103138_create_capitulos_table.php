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
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projecto_id')->references('id')->on('projectos')->onDelete('cascade');
            $table->string('projecto_associado');
            $table->integer('capitulo');
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
        Schema::dropIfExists('capitulos');
    }
};
