<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProportionsToShifts extends Migration
{

    public function up()
    {
        Schema::table(
            'shifts',
            function (Blueprint $table) {
                $table->unsignedBigInteger('proportion')
                    ->after('end');

                $table
                    ->foreign('proportion')
                    ->references('id')
                    ->on('shift_proportions');
            }
        );
    }

    public function down()
    {
        Schema::table(
            'shifts',
            function (Blueprint $table) {
                $table->dropForeign('proprtion');
                $table->dropColumn('proprtion');
            }
        );
    }
}
