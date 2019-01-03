	<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governerate_id')->references('id')->on('governerates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donation_request_id')->references('id')->on('donations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('donations', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
					});
		Schema::table('donations', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('city_client', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('city_client', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notifications')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

	}

	public function down()
	{
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governerate_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donation_request_id_foreign');
		});
		Schema::table('donations', function(Blueprint $table) {
			$table->dropForeign('donations_city_id_foreign');
		});
		Schema::table('donations', function(Blueprint $table) {
			$table->dropForeign('donations_blood_type_id_foreign');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->dropForeign('reports_client_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_city_id_foreign');
		});
		Schema::table('city_client', function(Blueprint $table) {
			$table->dropForeign('city_client_city_id_foreign');
		});
		Schema::table('city_client', function(Blueprint $table) {
			$table->dropForeign('city_client_client_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_client_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_blood_type_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_client_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_notification_id_foreign');

		});
	
	}
}