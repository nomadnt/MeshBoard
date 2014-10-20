<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DBInstall extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create meshboard user and database';

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
		$hostname = Config::get('database.connections.mysql.host');
		$database = Config::get('database.connections.mysql.database');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password');

		$_username = $this->ask('DB administrator username:');
		$_password = $this->secret('DB administrator password:');

		$DB = new PDO('mysql:host=localhost', $_username, $_password);
		// Drop user and database
		$DB->query("GRANT USAGE ON *.* TO '".$username."'@'".$hostname."'");
		$DB->query("DROP USER '".$username."'@'".$hostname."'");
		$DB->query("DROP DATABASE IF EXISTS `".$database."`");
		// Create user and database
		$DB->query("CREATE DATABASE IF NOT EXISTS `".$database."`");
		$DB->query("CREATE USER '".$username."'@'".$hostname."' IDENTIFIED BY '".$password."'");
		$DB->query("GRANT USAGE ON *.* TO '".$username."'@'".$hostname."' IDENTIFIED BY '".$password."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;");
		$DB->query("GRANT ALL PRIVILEGES ON `".$database."`.* TO '".$username."'@'".$hostname."' WITH GRANT OPTION");

		$this->info('Database installation completed');
		$this->call('migrate', array('--seed' => $this->option('seed')));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('seed', null, InputOption::VALUE_NONE, 'Populate meshboard database'),
		);
	}

}
