<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    public function up()
    {
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
