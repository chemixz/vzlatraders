<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
	        $table->increments('id');
	        $table->integer('credential')->unique();
	        $table->string('names',100);
	        $table->string('surnames',100);
	        $table->string('email',100)->unique();
	        $table->integer('tlf');
	       	$table->string('photo',200)->default('default_image.jpg');
	        $table->string('password');
			$table->enum('level', array(2,1))->default(1);
	        $table->string('remember_token',100);
	        $table->integer('state_id')->unsigned();
			$table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//
		});
	}

}
