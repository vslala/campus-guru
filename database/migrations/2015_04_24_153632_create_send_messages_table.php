<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('send_messages', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('sender_username');
            $table->string('reciever_username');
            $table->string('subject',1000);
            $table->string('message', 3000)->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_url')->nullable();
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
		Schema::drop('send_messages');
	}

}
