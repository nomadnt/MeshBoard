<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('networks', function(Blueprint $table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('country', 2)->default('00');
			$table->string('timezone')->default('Europe/Rome');
			$table->string('location');
			$table->string('lat')->default(0);
			$table->string('lng')->default(0);
			$table->string('password', 32);
			$table->integer('channel_2')->default(5);
			$table->integer('channel_5')->default(44);
			$table->boolean('encryption')->default(0);
			$table->binary('cfg')->nullable();
			//$table->integer('tts')->unsigned()->default(0);
			$table->timestamps();

			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::dropIfExists('networks');
	}
}
