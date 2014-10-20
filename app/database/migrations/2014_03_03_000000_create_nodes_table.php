<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('nodes', function(Blueprint $table){
			$table->increments('id');
			$table->integer('network_id')->unsigned();
			$table->string('device');
			$table->double('band', 2, 1)->default(2.4);
			$table->string('mac', 17)->unique();
			$table->string('name');
			$table->string('description');
			$table->string('location');
			$table->string('lat');
			$table->string('lng');
			$table->datetime('checkin');
			//$table->boolean('changed')->default(0);
			//$table->binary('cfg');
			$table->timestamps();

			$table->foreign('network_id')->references('id')->on('networks')->onDelete('cascade');
			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::dropIfExists('nodes');
	}
}
