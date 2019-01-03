<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 40);
			$table->string('email', 40);
			$table->date('birth_date');
			$table->string('phone', 15);
			$table->string('password', 255);
			$table->enum('blood_type', array('O+', 'O-', 'A+', 'A-', 'AB+', 'AB-')); 
			$table->date('donation_last_date');
			$table->integer('city_id')->unsigned();
			$table->string('api_token')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}