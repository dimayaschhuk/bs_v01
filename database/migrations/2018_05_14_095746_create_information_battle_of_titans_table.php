<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationBattleOfTitansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_battle_of_titans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id');
            $table->integer('players_id');
            $table->integer('period_number');
            $table->string('Information_field');
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
        Schema::dropIfExists('information_battle_of_titans');
    }
}
