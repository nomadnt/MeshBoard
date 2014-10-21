<?php

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$roles = array(
			array('name' => 'login'),
			array('name' => 'operator'),
			array('name' => 'admin'),
		);

		foreach($roles as $role) {
			$id = Role::create($role);
		}
	}

}