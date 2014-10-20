<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('users_roles', function(Blueprint $table){
	        $table->integer('user_id')->unsigned();
	        $table->integer('role_id')->unsigned();

	        $table->primary(array('user_id', 'role_id'));
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
	        $table->engine = 'InnoDB';
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::dropIfExists('users_roles');
	}

}