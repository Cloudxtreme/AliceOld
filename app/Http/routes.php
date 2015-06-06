<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', function (){
  return redirect()->to('/');
});

Route::controllers([
  'hosting' => 'HostingController',
  'member' => 'MemberController',
  'ticket' => 'TicketController',
  'admin' => 'AdminController',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
  '/' => 'HomeController',
]);
