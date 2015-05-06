<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;

class CreateDiscussionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('discussions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username');
            $table->string('title', 500);
            $table->string('category');
            $table->string('description', 10000);
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
//        DB::query('alter table discussions modify description varchar(255)');
		Schema::drop('discussions');
	}

}
