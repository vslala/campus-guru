<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_tags', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('tag')->unique();
            $table->integer('q_id')->unsigned();
            $table->foreign('q_id')->references('id')->on('questions')->onDelete('cascade');
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
		Schema::drop('question_tags');
	}

}
