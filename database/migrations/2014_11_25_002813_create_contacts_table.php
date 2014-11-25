<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',60);
			$table->string('email');
			$table->string('phone_number', 15);
			$table->string('industry', 60);
			$table->string('role', 60);
			$table->string('contactRelation', 60);
			$table->integer('contactAccount_id');
			$table->string('title', 60)->nullable();
			$table->string('website', 100)->nullable();
			$table->string('company', 60)->nullable();
			$table->timestamp('updated_at');
			$table->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
