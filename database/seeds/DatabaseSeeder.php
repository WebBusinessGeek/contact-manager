<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('ContactTableSeeder');
		$this->command->info('Contact table seeded!');

		$this->call('ContactAccountTableSeeder');
		$this->command->info('contactAccount table seeded!');
	}

}
