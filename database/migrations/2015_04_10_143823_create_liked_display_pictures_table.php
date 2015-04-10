<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikedDisplayPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liked_display_pictures', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->integer('dp_id')->unsigned();
            $table->foreign('dp_id')->references('id')->on('display_pictures')->onDelete('cascade');
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
		Schema::drop('liked_display_pictures');
	}

}
