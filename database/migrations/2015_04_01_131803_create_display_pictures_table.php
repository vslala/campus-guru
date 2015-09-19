<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('display_pictures', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string("username");
            $table->string("image_name");
            $table->string("image_type");
            $table->string("image_url");
            $table->integer("image_size")->unsigned();
            $table->integer("likeCount")->unsigned()->nullable();
            $table->integer("dislikeCount")->unsigned()->nullable();
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
		Schema::drop('display_pictures');
	}

}
