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
        Schema::create('custos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projecto_id')->references('id')->on('projectos')->onDelete('cascade');
            $table->string('despesas_inicial');
            $table->string('administracao_local');
            $table->string('administracao_central');
            $table->string('despesas_finaceiras');
            $table->string('despesas_manutencao');
            $table->string('riscos');
            $table->string('despesa_1');
            $table->string('despesa_2');
            $table->string('despesa_3');
            $table->string('iva');
            $table->string('irps');
            $table->string('tributo_1');
            $table->string('tributo_2');
            $table->string('tributo_3');
            $table->string('lucro_bruto');
            $table->string('indutor_custo');

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
        Schema::dropIfExists('custos');
    }
};
