@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $data->title }} <small>查看工单</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li>Ticket</li>
         <li class="active">查看工单</li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       @if (session('success'))
       <div class="alert alert-success" role="alert">
         <strong>提示信息</strong>
         {{ session('success') }}
       </div>
       @endif
       
       @if (session('error'))
       <div class="alert alert-danger" role="alert">
         <strong>错误提示</strong>
         {{ session('error') }}
       </div>
       @endif
       
      <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-body">
          <div class="direct-chat-messages">
          @foreach ($posts as $post)
            @if ($post->uid == Auth::user()->id)
            <div class="direct-chat-msg right">
              <div class='direct-chat-info clearfix'>
                <span class='direct-chat-name pull-right'>{{ Auth::user()->name }}</span>
                <span class='direct-chat-timestamp pull-left'>{{ $post->created_at->toDateTimeString() }}</span>
              </div><!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=128" alt="message user image" /><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                {{ $post->content }}
              </div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->
            @else
            <div class="direct-chat-msg">
              <div class='direct-chat-info clearfix'>
                <span class='direct-chat-name pull-left'>{{ \App\User::find($post->uid)->name }}</span>
                <span class='direct-chat-timestamp pull-right'>{{ $post->created_at->toDateTimeString() }}</span>
              </div><!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="https://secure.gravatar.com/avatar/{{ md5(\App\User::find($post->uid)->email) }}?s=128" alt="message user image" /><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                {{ $post->content }}
              </div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->
            @endif
          @endforeach
          </div><!--/.direct-chat-messages-->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <form class="form-horizontal" method="post" action="{{ url('ticket/reply/'.$data->id) }}">
            <div class="input-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" name="content" placeholder="发送回复" class="form-control"/>
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-flat">回复</button>
              </span>
            </div>
          </form>
        </div><!-- /.box-footer-->
      </div><!--/.direct-chat -->
     </section><!-- /.content -->
@stop
