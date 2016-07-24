<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropublicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('propublics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('proposal_complete')->default(0);
			$table->boolean('publisher_complete')->default(0);
			$table->integer('proposal_id')->unsigned();
			$table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
			$table->integer('publication_id')->unsigned();
			$table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
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
		Schema::drop('propublics');
	}

}
