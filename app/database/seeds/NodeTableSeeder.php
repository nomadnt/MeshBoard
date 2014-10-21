<?php

class NodeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$nodes = array(
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'dc:9f:db:08:54:74',
				'name' => 'Nomad NT',
				'location' => 'Via Senia 117, 97019 Vittoria (RG)',
				'lat' => '36.94986859999999',
				'lng' => '36.94986859999999',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:30:10:04',
				'name' => 'Giovanni Marotta',
				'location' => 'Via Senia 34, 97019 Vittoria (RG)',
				'lat' => '36.9520314',
				'lng' => '14.530567499999961',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '24:A4:3C:46:56:C4',
				'name' => 'Marianna Sallemi',
				'location' => 'Via San Martino 77, 97019 Vittoria (RG)',
				'lat' => '36.9482587',
				'lng' => '14.535765399999946',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:C6:04:9E',
				'name' => 'Domenico Ferraro',
				'location' => 'Via Senia 133, 97019 Vittoria (RG)',
				'lat' => '36.9495814',
				'lng' => '14.528213199999982',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '24:A4:3C:46:55:C3',
				'name' => 'Gianni Mallia',
				'location' => 'Via Cavour 82, 97019 Vittoria (RG)',
				'lat' => '36.9498021',
				'lng' => '14.53785049999999',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:26:AB:59',
				'name' => 'Emanuele Nicosia',
				'location' => 'Via Carlo Alberto 90, 97019 Vittoria (RG)',
				'lat' => '36.9492732',
				'lng' => '14.538069700000051',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:26:AB:58',
				'name' => 'Salvatore Sallemi',
				'location' => 'Via San Martino 384/C, 97019 Vittoria (RG)',
				'lat' => '36.9542535',
				'lng' => '14.524933199999964',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:96:2F:3A',
				'name' => 'Danilo Cantone',
				'location' => 'Via Principe Umberto 100, 97019 Vittoria (RG)',
				'lat' => '36.9505894',
				'lng' => '14.53740229999994',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '24:A4:3C:46:52:B5',
				'name' => 'Antonio Cosimo',
				'location' => 'Via Dell\'Acate, 97019 Vittoria (RG)',
				'lat' => '36.9530566',
				'lng' => '14.527373699999998',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:96:C9:41',
				'name' => 'Tavolino',
				'location' => 'Str. Scoglitti, 97019 Vittoria (RG)',
				'lat' => '36.93925338017551',
				'lng' => '14.523566889193717',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:08:5D:2B',
				'name' => 'Noemi Stimolo',
				'location' => 'Via Caporale degli Zuavi 200, 97019 Vittoria (RG)',
				'lat' => '36.954881',
				'lng' => '14.525957999999946',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:C6:02:A6',
				'name' => 'Davide Stimolo',
				'location' => 'Via Cacciatori Delle Alpi, 97019 Vittoria (RG)',
				'lat' => '36.94946760000001',
				'lng' => '14.530562299999929',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '24:A4:3C:46:55:29',
				'name' => 'Salvatore Stimolo',
				'location' => 'Via Cacciatori Delle Alpi, 97019 Vittoria (RG)',
				'lat' => '36.8933221',
				'lng' => '14.428889900000058',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:08:54:86',
				'name' => 'Giorgio Stimolo',
				'location' => 'Villaggio degli Ulivi, 97019 Vittoria (RG)',
				'lat' => '36.9299451',
				'lng' => '14.48470450000002',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:96:C9:27',
				'name' => 'Alessandro Stimolo',
				'location' => 'Villaggio degli Ulivi, 97019 Vittoria (RG)',
				'lat' => '36.9299451',
				'lng' => '14.48470450000002',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:26:AB:4D',
				'name' => 'Gaetano Amodei',
				'location' => 'Villaggio degli Ulivi, 97019 Vittoria (RG)',
				'lat' => '36.9299451',
				'lng' => '14.48470450000002',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:08:54:0F',
				'name' => 'Antonio Cantone',
				'location' => 'Via R. Settimo 136, 97019 Vittoria (RG)',
				'lat' => '36.9485214',
				'lng' => '14.534084900000039',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:30:11:6C',
				'name' => 'Denise Giacchi',
				'location' => 'Via Roma 181, 97019 Vittoria (RG)',
				'lat' => '36.9510735',
				'lng' => '14.530402600000002',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:30:11:6E',
				'name' => 'Federica Meli',
				'location' => 'Via Cernaia 96, 97019 Vittoria (RG)',
				'lat' => '36.9514212',
				'lng' => '14.533609399999932',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:30:10:D0',
				'name' => 'Matteo Lupò',
				'location' => 'Via Cacciatori del Tevere, 97019 Vittoria (RG)',
				'lat' => '36.9463938',
				'lng' => '14.534528899999941',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:30:10:9A',
				'name' => 'Giuseppe Licitra',
				'location' => 'Via Carlo Alberto 101, 97019 Vittoria (RG)',
				'lat' => '36.949677',
				'lng' => '14.53753800000004',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:40:53:AD',
				'name' => 'Galleria Fiaba',
				'location' => 'Via Bixio 289, 97019 Vittoria (RG)',
				'lat' => '36.9532125',
				'lng' => '14.531236600000057',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => 'DC:9F:DB:38:10:5E',
				'name' => 'Andrea Missud',
				'location' => 'Via Carlo Pisacane 53, 97019 Vittoria (RG)',
				'lat' => '36.9487949',
				'lng' => '14.53043619999994',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico',
				'band' => 2.4,
				'mac' => '00:15:6D:B0:19:40',
				'name' => 'Alessandro Scirè',
				'location' => 'Via F.lli Briganti, 97019 Vittoria (RG)',
				'lat' => '36.9520998',
				'lng' => '14.537265299999945',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:40:53:DF',
				'name' => 'Giovanni Sallemi',
				'location' => 'Scoglitti (RG)',
				'lat' => '36.917352118132044',
				'lng' => '14.416036754400693',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:40:53:03',
				'name' => 'Salvatore Occhipinti',
				'location' => 'Via dei Granchi 1, 97010 Scoglitti (RG)',
				'lat' => '36.899743',
				'lng' => '14.424800000000005',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico',
				'band' => 2.4,
				'mac' => '00:15:6D:72:46:43',
				'name' => 'Salvatore Sallemi',
				'location' => 'Scoglitti (RG)',
				'lat' => '36.91485595660305',
				'lng' => '14.414545446188413',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico',
				'band' => 2.4,
				'mac' => '00:15:6D:72:46:4B',
				'name' => 'Franco Aulino',
				'location' => 'Via Baia Dorica, 97010 Scoglitti (RG)',
				'lat' => '36.91678913326778',
				'lng' => '14.412899694967678',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano',
				'band' => 2.4,
				'mac' => '00:15:6D:B0:36:7C',
				'name' => 'Nuccio La Spina',
				'location' => 'Via Parigi, 97010 Scoglitti (RG)',
				'lat' => '36.91525499999999',
				'lng' => '14.414068000000043',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico',
				'band' => 2.4,
				'mac' => '00:15:6d:72:46:a7',
				'name' => 'Emanuele Nicosia',
				'location' => 'Via Riviera Gela, 97010 Scoglitti (RG)',
				'lat' => '',
				'lng' => '',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:26:AB:54',
				'name' => 'Giovanni Meli',
				'location' => 'Via Taranto 58, 97010 Scoglitti (RG)',
				'lat' => '36.893771',
				'lng' => '14.429421000000048',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico',
				'band' => 2.4,
				'mac' => '00:15:6D:FE:8F:22',
				'name' => 'Alessandro Scirè',
				'location' => 'Scoglitti (RG)',
				'lat' => '36.89348512811642',
				'lng' => '14.428734331877195',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:pico-m',
				'band' => 2.4,
				'mac' => '00:27:22:40:52:16',
				'name' => 'Angelo Dezio',
				'location' => 'Via dei Gamberi, 97010 Scoglitti (RG)',
				'lat' => '36.8982754007048',
				'lng' => '14.42552347777098',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:08:5D:2D',
				'name' => 'Roberto Cosentino',
				'location' => 'Via Antonio Federico, 97010 Scoglitti (RG)',
				'lat' => '36.89933248318877',
				'lng' => '14.428895944427495',
			),
			array(
				'network_id' => 1,
				'device' => 'ubnt:nano-m',
				'band' => 2.4,
				'mac' => '00:27:22:26:aa:f7',
				'name' => 'Gaetano Amodei',
				'location' => 'Via Bassanesi, 97010 Scoglitti (RG)',
				'lat' => '',
				'lng' => '',
			),
		);

		foreach($nodes as $node) Node::create($node);
	}

}