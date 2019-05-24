<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('book', function(Blueprint $table)
		{
			$table->foreign('id_category', 'book_ibfk_1')->references('id')->on('category')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_publisher', 'book_ibfk_2')->references('id')->on('publisher')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('book', function(Blueprint $table)
		{
			$table->dropForeign('book_ibfk_1');
			$table->dropForeign('book_ibfk_2');
		});
	}

}
