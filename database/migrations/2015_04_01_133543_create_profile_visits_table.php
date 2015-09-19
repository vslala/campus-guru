<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_visits', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("count")->unsigned();
            $table->integer("profile_id")->unsigned();
            $table->foreign('profile_id')
                ->references('id')->on('profiles')
                ->onDelete('cascade');
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
		Schema::drop('profile_visits');
	}

}
