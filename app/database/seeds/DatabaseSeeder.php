<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('NetworkTableSeeder');
		$this->call('NodeTableSeeder');
	}

}