<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikedDiscussionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liked_discussions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->integer('rep_id')->unsigned();
            $table->integer('d_id')->unsigned();
            $table->boolean('like');
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
		Schema::drop('liked_discussions');
	}

}
