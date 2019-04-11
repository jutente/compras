<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuperintendenciaIdTrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trs', function (Blueprint $table) {

            $table->unsignedInteger('superintendencia_id');

            $table->foreign('superintendencia_id')->references('id')->on('superintendencias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trs', function (Blueprint $table) {

            $table->dropForeign(['superintendencia_id']);

        });
    }
}
