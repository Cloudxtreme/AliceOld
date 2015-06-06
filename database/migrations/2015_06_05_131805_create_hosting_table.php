<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hosting', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->increments('id');
      $table->string('uid', 16);
      $table->string('server', 16);
      $table->string('label');
      $table->string('disk');       //used
      $table->string('bandwidth');  //used
      $table->string('domain');     //list
      $table->string('mysql');      //user or 0
      $table->string('ftp');        //user or 0
      $table->string('htaccess');   //htaccess id
      $table->string('phpver');     //php version
      $table->string('status');
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
		Schema::drop('hosting');
	}

}
