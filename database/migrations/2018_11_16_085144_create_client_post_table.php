<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_post', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('client_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_post');
    }
}
