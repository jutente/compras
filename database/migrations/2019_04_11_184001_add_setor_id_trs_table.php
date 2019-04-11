<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSetorIdTrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trs', function (Blueprint $table) {

            $table->unsignedInteger('setor_id');

            $table->foreign('setor_id')->references('id')->on('setors');

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

            $table->dropForeign(['setor_id']);

        });
    }
}
