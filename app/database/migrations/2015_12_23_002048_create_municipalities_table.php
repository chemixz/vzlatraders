<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMunicipalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipalities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
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
		Schema::drop('municipalities');
	}

}
