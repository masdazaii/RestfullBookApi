<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_category')->index('id_category');
			$table->integer('id_publisher')->index('id_penerbit');
			$table->string('title', 250);
			$table->string('author', 250);
			$table->string('isbn', 250);
			$table->string('year', 10);
			$table->string('file', 250);
			$table->string('thumbnail', 100);
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
		Schema::drop('book');
	}

}
