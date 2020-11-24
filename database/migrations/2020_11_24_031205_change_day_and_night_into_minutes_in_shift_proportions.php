<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDayAndNightIntoMinutesInShiftProportions extends Migration
{

    public function up()
    {
        Schema::table(
            'shift_proportions',
            function (Blueprint $table) {
                $table->integer('day')->change();
                $table->integer('night')->change();
            }
        );
    }

    public function down()
    {
        Schema::table(
            'shift_proportions',
            function (Blueprint $table) {
                $table->time('day')->change();
                $table->time('night')->change();
            }
        );
    }
}
