<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	public function up()
	{
		Schema::create('donations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name', 40);
			$table->integer('patient_age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('blood_bags');
			$table->string('hospital_name', 40);
			$table->string('hospital_address', 100);
			$table->string('phone', 15)->unique();
			$table->text('notes');
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donations');
	}
}