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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividade_id')->references('id')->on('actividades')->onDelete('cascade');
            $table->double('dh')->default(0);
            $table->double('jh')->default(0);
            $table->double('sh')->default(0);
            $table->double('ah')->default(0);
            $table->double('ph')->default(0);
            $table->double('eh')->default(0);
            $table->double('ch')->default(0);
            $table->double('lh')->default(0);
            $table->double('valorAluguel')->default(0);
            $table->double('moh')->default(0);
            $table->double('mh')->default(0);

            $table->double('totalP')->default(0);
            $table->double('totalIp')->default(0);
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
        Schema::dropIfExists('equipamentos');
    }
};
