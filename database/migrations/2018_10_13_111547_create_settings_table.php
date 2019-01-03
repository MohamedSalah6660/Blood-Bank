<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone', 15);
			$table->string('email', 40);
			$table->longText('about_app');
			$table->text('facebook_url');
			$table->text('twitter_url');
			$table->integer('whatsapp');
			$table->text('instgram');
			$table->text('google_url');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}