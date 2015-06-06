<?php namespace App\Http\Controllers;

class HostingController extends Controller {

  public function __construct(){
		$this->middleware('auth');
	}

	public function getDeploy(){
		return view('hosting/deploy');
	}
  
  public function getList(){
    return view('hosting/list');
  }

}
