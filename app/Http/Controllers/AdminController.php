<?php namespace App\Http\Controllers;

class AdminController extends Controller {

	public function __construct(){
		$this->middleware('admin');
	}

	public function getIndex(){
		return view('admin/home');
	}

}
