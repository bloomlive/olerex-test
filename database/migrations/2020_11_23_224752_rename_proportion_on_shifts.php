<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProportionOnShifts extends Migration
{

    public function up()
    {
        Schema::table(
            'shifts',
            function (Blueprint $table) {
                $table->renameColumn('proportion', 'proportion_id');
            }
        );
    }

    public function down()
    {
        Schema::table(
            'shifts',
            function (Blueprint $table) {
                $table->renameColumn('proportion_id', 'proportion');
            }
        );
    }
}
