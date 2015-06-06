<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	public function getIndex(){
		return view('home');
	}
  
  public function getAnnouncement($id = false){
    if($id){
      return view('announcement/detail');
    }else{
      return view('announcement/list');
    }
  }

}
