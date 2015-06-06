@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        个人资料设置 <small>请在下面修改您的个人信息</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li>Member</li>
         <li class="active">个人资料设置</li>
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
       <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">
             修改密码
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
           <div class="col-md-7">
             <form class="form-horizontal" method="post" action="{{ url('member/password') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                 <label class="col-sm-2 control-label">原密码</label>
                 <div class="col-sm-10">
                   <input type="password" name="password" class="form-control" placeholder="请输入原密码">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">新密码</label>
                 <div class="col-sm-10">
                   <input type="password" name="new_password" class="form-control" placeholder="请输入新密码">
                 </div>
               </div>
               <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">提交</button>
                 </div>
               </div>
             </form>
           </div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
       
       <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">
             修改邮箱
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
           <div class="col-md-7">
             <form class="form-horizontal" method="post" action="{{ url('member/email') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                 <label class="col-sm-2 control-label">密码</label>
                 <div class="col-sm-10">
                   <input type="password" name="password" class="form-control" placeholder="请输入密码">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">邮箱</label>
                 <div class="col-sm-10">
                   <input type="email" name="email" class="form-control" placeholder="请输入邮箱" value="{{ Auth::user()->email }}">
                 </div>
               </div>
               <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                   <button type="submit" class="btn btn-primary">提交</button>
                 </div>
               </div>
             </form>
           </div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
