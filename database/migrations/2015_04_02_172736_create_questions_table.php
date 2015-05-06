<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->string('title', 500);
            $table->string('category');
            $table->string('description',10000);
//            $table->string('image_name')->nullable();
//            $table->string('image_type')->nullable();
//            $table->string('image_url')->nullable();
//            $table->integer('image_size')->unsigned()->nullable();
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
		Schema::drop('questions');
	}

}
