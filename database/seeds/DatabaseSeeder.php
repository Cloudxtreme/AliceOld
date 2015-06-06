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
        'charge' => '0'
      ]
    );
	}

}
