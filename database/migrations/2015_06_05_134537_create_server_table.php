<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('server', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->increments('id');
      $table->string('name', 16);
      $table->string('ip', 16);
      $table->string('port', 8);
      $table->string('key', 32);
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
		Schema::drop('server');
	}

}
