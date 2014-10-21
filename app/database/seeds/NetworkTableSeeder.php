<?php

class NetworkTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$networks = array(
			array(
				'name' => 'MeOS',
				'country' => 'IT',
				'timezone' => 'Europe/Rome',
				'location' => 'Vittoria (RG)',
				'password' => 'flym305fly',
			),
			array(
				'name' => 'IF4U',
				'country' => 'IT',
				'timezone' => 'Europe/Rome',
				'location' => 'Vittoria (RG)',
				'password' => 'mycoolmeshnetwork',
			)
		);

		foreach($networks as $network) Network::create($network);
	}

}