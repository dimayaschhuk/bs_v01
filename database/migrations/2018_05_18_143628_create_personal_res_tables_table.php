<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalResTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_res_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('res_per_id');
            $table->string('type');
            $table->longText('1_1');
            $table->longText('1_2');
            $table->longText('1_3');
            $table->longText('1_4');
            $table->longText('1_5');
            $table->longText('1_6');
            $table->longText('1_7');
            $table->longText('1_8');
            $table->longText('1_9');
            $table->longText('1_10');
            $table->longText('1_11');
            $table->longText('1_12');
            $table->longText('1_13');
            $table->longText('1_14');
            $table->longText('1_15');
            $table->longText('1_16');
            $table->longText('1_17');
            $table->longText('1_18');
            $table->longText('1_19');
            $table->longText('2_1');
            $table->longText('2_2');
            $table->longText('2_3');
            $table->longText('2_4');
            $table->longText('2_5');
            $table->longText('2_6');
            $table->longText('3_1');
            $table->longText('3_2');
            $table->longText('3_3');
            $table->longText('3_4');
            $table->longText('3_5');
            $table->longText('3_6');
            $table->longText('4_1');
            $table->longText('4_2');
            $table->longText('4_3');
            $table->longText('4_4');
            $table->longText('4_5');
            $table->longText('4_6');
            $table->longText('4_7');
            $table->longText('4_8');
            $table->longText('4_9');
            $table->longText('4_10');
            $table->longText('4_11');
            $table->longText('4_12');
            $table->longText('4_13');
            $table->longText('4_14');
            $table->longText('4_15');
            $table->longText('4_16');
            $table->longText('4_17');
            $table->longText('4_18');
            $table->longText('4_19');
            $table->longText('4_20');
            $table->longText('4_21');
            $table->longText('5_1');
            $table->longText('5_2');
            $table->longText('5_3');
            $table->longText('5_4');
            $table->longText('5_5');
            $table->longText('5_6');
            $table->longText('5_7');
            $table->longText('5_8');
            $table->longText('5_9');
            $table->longText('6_1');
            $table->longText('6_2');
            $table->longText('6_3');
            $table->longText('6_4');
            $table->longText('6_5');
            $table->longText('6_6');
            $table->longText('6_7');
            $table->longText('6_8_1');
            $table->longText('6_8_2');
            $table->longText('6_8_3');
            $table->longText('6_9_1');
            $table->longText('6_9_2');
            $table->longText('6_9_3');
            $table->longText('6_10_1');
            $table->longText('6_10_2');
            $table->longText('6_10_3');
            $table->longText('6_11');
            $table->longText('6_12');
            $table->longText('6_13');
            $table->longText('6_14');
            $table->longText('6_15');
            $table->longText('6_16_1');
            $table->longText('6_16_2');
            $table->longText('6_16_3');
            $table->longText('6_17_1');
            $table->longText('6_17_2');
            $table->longText('6_17_3');
            $table->longText('6_18_1');
            $table->longText('6_18_2');
            $table->longText('6_18_3');
            $table->longText('6_19');
            $table->longText('6_20_1');
            $table->longText('6_20_2');
            $table->longText('6_20_3');
            $table->longText('6_21_1');
            $table->longText('6_21_2');
            $table->longText('6_21_3');
            $table->longText('6_22_1');
            $table->longText('6_22_2');
            $table->longText('6_22_3');
            $table->longText('6_23');
            $table->longText('6_24');
            $table->longText('6_25');
            $table->longText('6_26');
            $table->longText('6_27');
            $table->longText('6_28');

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
        Schema::dropIfExists('personal_res_tables');
    }
}
