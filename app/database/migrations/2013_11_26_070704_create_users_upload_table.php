<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersUploadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_upload', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid')->index();
			$table->string('filpath',255);
			$table->enum('status', array('Not verified','verified', 'processing','unknown'));
			$table->string('specisname',100);
			$table->string('specificname',100);
			$table->string('area',50);
			$table->string('recorded_on',50);
			$table->string('identified_img',100);
			$table->integer('identfId')->index();
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
		Schema::drop('users_upload');
	}

}
