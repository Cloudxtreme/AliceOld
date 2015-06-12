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
      $announcement = \App\Announcement::find($id);
      if(@!$announcement->id){
      Session::flash('error', '没有此条记录');
        return redirect()->to('announcement');
      }
      return view('announcement/detail')->withData($announcement);
    }else{
      $datas = \App\Announcement::orderBy('updated_at', 'desc')->paginate(20);
      return view('announcement/list')->withDatas($datas);
    }
  }

}
