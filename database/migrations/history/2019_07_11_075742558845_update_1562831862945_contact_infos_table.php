<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562831862945ContactInfosTable extends Migration
{
    public function up()
    {
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('phone');
        });
    }

    public function down()
    {
        Schema::table('contact_infos', function (Blueprint $table) {
        });
    }
}
