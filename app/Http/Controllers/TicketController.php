<?php namespace App\Http\Controllers;

use Request;
use Session;
use Auth;

class TicketController extends Controller {

  public function __construct(){
		$this->middleware('auth');
	}
  
  public function getAdd(){
    return view('ticket/add');
  }
  
  public function postAdd(){
    $title = Request::input('title');
    $content = Request::input('content');
    if(!$title || !$content){
      Session::flash('error', '请填写完整的信息');
      return back()->withInput();
    }
    
    $ticket = new \App\Tickets;
    $ticket->uid = Auth::user()->id;
    $ticket->title = $title;
    $ticket->last_post = Auth::user()->id;
    $ticket->status = 'admin';
    $ticket->save();
    
    $post = new \App\TicketPost;
    $post->tid = $ticket->id;
    $post->content = $content;
    $post->uid = Auth::user()->id;
    $post->save();
    
    Session::flash('success', '工单提交完成');
    return redirect()->to('ticket/list');
  }
  
  public function getList(){
    $tickets = \App\Tickets::where('uid', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(20);
    return view('ticket/list')->withDatas($tickets);
  }
  
  public function getDetail($id){
    $ticket = \App\Tickets::find($id);
    if(@!$ticket->id){
      Session::flash('error', '找不到此工单');
      return redirect()->to('ticket/list');
    }
    $posts = \App\TicketPost::where('tid', $ticket->id)->paginate(20);
    
    return view('ticket/detail')->withData($ticket)->withPosts($posts);
  }
  
  public function postReply($id){
    $content = Request::input('content');
    if(!$content){
      Session::flash('error', '请填写回复内容');
      return back()->withInput();
    }
    
    $ticket = \App\Tickets::find($id);
    if(@!$ticket->id){
      Session::flash('error', '找不到此工单');
      return redirect()->to('ticket/list');
    }
    
    $ticket->last_post = Auth::user()->id;
    $ticket->status = 'admin';
    $ticket->save();
    
    $post = new \App\TicketPost;
    $post->tid = $ticket->id;
    $post->content = $content;
    $post->uid = Auth::user()->id;
    $post->save();
    
    Session::flash('success', '工单回复完成');
    return redirect()->to('ticket/detail/'.$id);
  }

}
