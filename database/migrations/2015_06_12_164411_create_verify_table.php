<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('verify', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->string('uid')->unique();
      $table->string('email');  //ok or code or 0
      $table->string('phone');  //ok or code or 0
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
		Schema::drop('verify');
	}

}
