<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDislikedDiscussionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disliked_discussions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->integer('rep_id')->unsigned();
            $table->integer('d_id')->unsigned();
            $table->boolean('dislike');
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
		Schema::drop('disliked_discussions');
	}

}
