<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562830329222ContactInfosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('contact_infos')) {
            Schema::create('contact_infos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->longText('address');
                $table->string('email');
                $table->integer('phone');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('contact_infos');
    }
}
