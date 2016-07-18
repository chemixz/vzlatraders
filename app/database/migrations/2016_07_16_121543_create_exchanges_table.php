<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExchangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exchanges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('publication_picture',100);
			$table->string('publication_autor_names',100);
			$table->string('proposal_picture',100);
			$table->string('proposal_autor_names',100);
			$table->enum('status', array('progress','canceled','finished'))->default('progress');
			$table->integer('proposal_id')->unsigned();
			$table->integer('publication_id')->unsigned();
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
		Schema::drop('exchanges');
	}

}
