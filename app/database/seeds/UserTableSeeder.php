<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$users = array(
			array(
				'email' => 'fsallemi@nomadnt.com',
				'password' => Hash::make('admin'),
				'language' => 'en',
				'route' => 'network'
			)
		);

		foreach($users as $user) {
			$_user = User::create($user);
			$_user->roles()->attach(1);
		}
	}

}