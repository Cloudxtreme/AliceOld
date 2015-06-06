<?php namespace App\Http\Controllers;

class TicketController extends Controller {

  public function __construct(){
		$this->middleware('auth');
	}
  
  public function getAdd(){
    return view('ticket/add');
  }
  
  public function getList(){
    return view('ticket/list');
  }

}
