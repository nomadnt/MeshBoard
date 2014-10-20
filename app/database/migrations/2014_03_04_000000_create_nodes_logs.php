<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesLogs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('node_logs', function(Blueprint $table){
			$table->increments('id');
			$table->integer('node_id')->unsigned();
			$table->datetime('date');
			$table->binary('data');
			//$table->string('public_ip');

			$table->foreign('node_id')->references('id')->on('nodes')->onDelete('cascade');
			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::dropIfExists('node_logs');
	}

}
