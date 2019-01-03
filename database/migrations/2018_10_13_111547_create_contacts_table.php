<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 100);
			$table->longText('message');
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}