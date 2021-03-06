<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{

    public function up()
    {
        Schema::create(
            'shifts',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->time('start');
                $table->time('end');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}
