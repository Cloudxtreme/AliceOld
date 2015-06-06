<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtaccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('htaccess', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('name');
      $table->string('filename');
			$table->timestamps();
		});
    
    DB::table('htaccess')->insert(
      ['name' => 'none', 'filename' => 'none.conf']
    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('htaccess');
	}

}
