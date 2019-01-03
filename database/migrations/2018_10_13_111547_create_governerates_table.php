<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoverneratesTable extends Migration {

	public function up()
	{
		Schema::create('governerates', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 40);
		});
	}

	public function down()
	{
		Schema::drop('governerates');
	}
}