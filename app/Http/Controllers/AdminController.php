<?php namespace App\Http\Controllers;

use Request;
use Session;
use Auth;

class AdminController extends Controller {

	public function __construct(){
		$this->middleware('admin');
	}

	public function getIndex(){
		return view('admin/home');
	}
  
  public function getAnnouncement($id = false){
    if($id){
      $announcement = \App\Announcement::find($id);
      if(!$announcement){
      Session::flash('error', '没有此条记录');
        return redirect()->to('admin/announcement');
      }
      return view('admin/announcement/detail')->withData($announcement);
    }else{
      $datas = \App\Announcement::orderBy('updated_at', 'desc')->paginate(20);
      return view('admin/announcement/list')->withDatas($datas);
    }
  }
  
  public function getAnnouncementAdd(){
    return view('admin/announcement/add');
  }
  
  public function postAnnouncementAdd(){
    $title = Request::input('title');
    $content = Request::input('content');
    
    $announcement = new \App\Announcement;
    $announcement->title = $title;
    $announcement->content = $content;
    $announcement->save();
    
    Session::flash('success', '公告添加成功');
    return redirect()->to('admin/announcement');
  }
  
  public function postAnnouncementEdit($id){
    $title = Request::input('title');
    $content = Request::input('content');
    
    $announcement = \App\Announcement::find($id);
    if(!$announcement){
      Session::flash('error', '没有此条记录');
      return redirect()->to('admin/announcement');
    }
    $announcement->title = $title;
    $announcement->content = $content;
    $announcement->save();
    
    Session::flash('success', '公告修改成功');
    return redirect()->to('admin/announcement/'.$id);
  }
  
  public function getTicket($type = 'reply'){
    switch($type){
      case 'reply':
        $tickets = \App\Tickets::where('status', 'admin')->orderBy('updated_at', 'desc')->paginate(20);
        break;
      case 'all':
        $tickets = \App\Tickets::orderBy('updated_at', 'desc')->paginate(20);
        break;
      default:
        return redirect()->to('admin/ticket');
    }
    return view('admin/ticket/list')->withDatas($tickets);
  }
  
  public function getTicketDetail($id){
    $ticket = \App\Tickets::find($id);
    if(@!$ticket->id){
      Session::flash('error', '没有此工单');
      return redirect()->to('admin/ticket');
    }
    $posts = \App\TicketPost::where('tid', $ticket->id)->paginate(20);
    
    return view('admin/ticket/detail')->withData($ticket)->withPosts($posts);
  }
  
  public function postTicketReply($id){
    $content = Request::input('content');
    if(!$content){
      Session::flash('error', '请填写回复内容');
      return back()->withInput();
    }
    
    $ticket = \App\Tickets::find($id);
    if(@!$ticket->id){
      Session::flash('error', '没有此工单');
      return redirect()->to('admin/ticket');
    }
    
    $ticket->last_post = Auth::user()->id;
    $ticket->status = 'user';
    $ticket->save();
    
    $post = new \App\TicketPost;
    $post->tid = $ticket->id;
    $post->content = $content;
    $post->uid = Auth::user()->id;
    $post->save();
    
    Session::flash('success', '工单回复完成');
    return redirect()->to('admin/ticket-detail/'.$id);
  }

}
