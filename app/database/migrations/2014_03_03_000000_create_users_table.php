<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('users', function(Blueprint $table){
	        $table->increments('id');
	        $table->string('email')->unique();
	        //$table->string('username')->unique();
	        $table->string('password');
	        $table->string('mobile')->unique();
	        $table->string('language');
	        $table->string('route');
	        $table->string('remember_token', 100)->nullable();
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
		Schema::dropIfExists('users');
	}

}
