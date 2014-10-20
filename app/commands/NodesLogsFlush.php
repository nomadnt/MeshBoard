<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class NodesLogsFlush extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'nodes:logs:flush';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Flush node log older than 24 hours';

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
			$networks = array(Network::with('nodes')->findOrFail($this->argument('network')));
		}else{
			$networks = Network::with('nodes')->get();
		}

		foreach($networks as $network){
			foreach($network->nodes as $node){
				$node->logs()->where('date', '<', DB::raw('NOW() - INTERVAL 24 HOUR'))->delete();
			}
			$this->info('Flushed network '.$network->name);
		}
		$this->info("Networks Logs flushed!");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('network', InputArgument::OPTIONAL, 'Flush logs for network id'),
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
