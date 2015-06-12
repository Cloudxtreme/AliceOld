<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		User::create(
      [
        'name' => 'kurotokiya',
        'email' => 'me@tokiya.me',
        'password' => Hash::make('123456'),
        'charge' => '10000',
        'phone' => '13012345678',
        'group' => 'admin',
        'status' => 'ok'
      ]
    );
    User::create(
      [
        'name' => 'newcxs',
        'email' => 'newcxs@qq.com',
        'password' => Hash::make('123456'),
        'charge' => '10000',
        'phone' => '13112345678',
        'group' => 'admin',
        'status' => 'ok'
      ]
    );
	}

}
