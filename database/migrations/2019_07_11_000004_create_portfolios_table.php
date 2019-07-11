<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('name');
            $table->string('client');
            $table->string('text_colour');
            $table->longText('description');
            $table->boolean('pinned')->default(0);
            $table->integer('order');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
