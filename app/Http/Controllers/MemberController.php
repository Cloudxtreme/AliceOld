<?php namespace App\Http\Controllers;

use Auth;
use Request;
use Hash;
use Session;

class MemberController extends Controller {

  public function __construct(){
		$this->middleware('auth');
	}

	public function getProfile(){
		return view('member/profile');
	}
  
  public function postPassword(){
    $password = Request::input('password');
    if(!Hash::check($password, Auth::user()->password)){
      Session::flash('error', '原密码错误');
      return redirect()->to('member/profile');
    }
    $new_password = Request::input('new_password');
    $user = \App\User::find(Auth::user()->id);
    $user->password = Hash::make($new_password);
    $user->save();
    Session::flush();
    Session::flash('success', '密码修改成功，请重新登录');
    return redirect()->to('auth/login');
  }
  
  public function postEmail(){
    Session::flash('error', '功能开发中...');
    return redirect()->to('member/profile');
  }
  
  public function getCharge(){
    $uid = Auth::user()->id;
    $logs = \App\Invoice::where('uid', $uid)->paginate(20);
    
    return view('member/charge')->withLogs($logs);
  }

}
