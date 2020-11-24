<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftProportionsTable extends Migration
{

    public function up()
    {
        Schema::create(
            'shift_proportions',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->time('day');
                $table->time('night');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('shift_proportions');
    }
}
