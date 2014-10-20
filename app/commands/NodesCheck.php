<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class NodesCheck extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'nodes:check';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check the last checkin date of all nodes and send email for dead nodes';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		if(!is_null($this->argument('network'))){
			$networks = array(Network::findOrFail($this->argument('network')));
		}else{
			$networks = Network::all();
		}

		foreach($networks as $network){
			$nodes = $network->nodes()
				->where('checkin', '<', DB::raw('NOW() - INTERVAL 15 MINUTE'))
				->where('checkin', '<', DB::raw('NOW() + INTERVAL 3 DAY'))
				->get();

			if($nodes->count()){
				$data = array('network' => $network, 'nodes' => $nodes->toArray());
				Mail::send('emails.network.alert', $data, function($message){
    				$message->to('fsallemi@nomadnt.com', 'Filippo Sallemi')->subject('Nodes Alers!');
				});
				$this->info("Email sent for network: ". $network->name);
			}
		}
		$this->info("Node check executed!");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('network', InputArgument::OPTIONAL, 'Check nodes for network id'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
