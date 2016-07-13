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
			$table->string('product_name',100);
			$table->string('product_brand',100);
	       	$table->text('description');
	       	$table->float('value');
	       	$table->string('picture',200)->default('package.jpg');
			$table->enum('status', array('Active', 'Inactive','Finished'))->default('Inactive');
			$table->integer('user_id')->unsigned();
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
