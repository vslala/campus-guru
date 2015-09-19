<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discussion_tags', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('tag')->unique();
            $table->integer('d_id')->unsigned();
            $table->foreign('d_id')->references('id')->on('discussions')->onDelete('cascade');
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
		Schema::drop('discussion_tags');
	}

}
