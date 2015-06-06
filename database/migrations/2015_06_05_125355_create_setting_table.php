<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setting', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->string('key', 16)->unique();
      $table->string('value', 64);
		});
    
    DB::table('setting')->insert(
      ['key' => 'sitename', 'value' => 'SodaHost']
    );
    DB::table('setting')->insert(
      ['key' => 'siteurl', 'value' => 'http://soda.sonata.moe']
    );
    DB::table('setting')->insert(
      ['key' => 'charge_name', 'value' => '金币']
    );
    DB::table('setting')->insert(
      ['key' => 'notice', 'value' => '请尽情享用~']
    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('setting');
	}

}
