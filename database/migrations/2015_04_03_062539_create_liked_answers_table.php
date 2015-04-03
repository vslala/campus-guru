<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikedAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liked_answers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->integer('ans_id')->unsigned();
            $table->integer('q_id')->unsigned();
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
		Schema::drop('liked_answers');
	}

}
