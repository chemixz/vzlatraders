<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table)
		{
			$table->increments('id');
	       	$table->text('description');
	       	$table->text('changeoptions',200);
	       	$table->string('picture1',200)->default('package.jpg');
	       	$table->string('picture2',200)->default('package.jpg');
	       	$table->string('picture3',200)->default('package.jpg');
	       	$table->integer('cover')->default(0);
			$table->enum('status', array('active', 'inprogress','completed'))->default('active');
			$table->integer('user_id')->unsigned();
			$table->integer('stock');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('municipality_id')->unsigned();
			$table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
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
		Schema::drop('publications');
	}

}
