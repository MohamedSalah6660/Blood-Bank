<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 100);
			$table->longText('content');
			$table->string('thumbnail', 100);
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}