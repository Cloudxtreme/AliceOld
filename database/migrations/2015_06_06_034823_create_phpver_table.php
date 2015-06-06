<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhpverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phpver', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->string('ver')->unique();
      $table->string('sock');
			$table->timestamps();
		});
    
    DB::table('phpver')->insert(
      ['ver' => '5.6', 'sock' => '/dev/shm/php-cgi-5.6.sock']
    );
    DB::table('phpver')->insert(
      ['ver' => '5.3', 'sock' => '/dev/shm/php-cgi-5.3.sock']
    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phpver');
	}

}
