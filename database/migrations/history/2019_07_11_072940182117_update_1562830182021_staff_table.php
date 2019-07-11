<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562830182021StaffTable extends Migration
{
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('description');
        });
        Schema::table('staff', function (Blueprint $table) {
            $table->longText('description');
        });
    }

    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
        });
    }
}
