<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');

            $table->string('pac', 15);
            $table->string('modalidade', 30);

            $table->date('cotacao')->nullable();
            $table->date('reservaorcamentariainicio')->nullable();
            $table->date('reservaorcamentariafim')->nullable();
            $table->date('mapasigma')->nullable();
            $table->date('autuacao')->nullable();
            $table->date('ordenadorinicio')->nullable();
            $table->date('ordenadorfim')->nullable();
            $table->date('coafinicio')->nullable();
            $table->date('coaffim')->nullable();
            $table->date('emailtrcontrato')->nullable();
            $table->date('minutainicio')->nullable();
            $table->date('minutafim')->nullable();
            $table->date('juridicoinicio')->nullable();
            $table->date('juridicofim')->nullable();
            $table->date('pgminicio')->nullable();
            $table->date('pgmfim')->nullable();
            $table->date('preparoratificacao')->nullable();
            $table->date('assinaturaratificacaoinicio')->nullable();
            $table->date('assinaturaratificacaofim')->nullable();
            $table->date('publicacaoratificacao')->nullable();
            $table->date('conclusao')->nullable();
            $table->text('observacao')->nullable();

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
        Schema::dropIfExists('compras');
    }
}
