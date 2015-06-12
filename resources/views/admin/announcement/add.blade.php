@extends('admin')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>系统公告 <a href="{{ url('admin/announcement') }}"><i class="fa fa-list"></i></a></h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 管理面板</a></li>
         <li>系统公告</li>
         <li class="active">添加</li>
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
             添加公告
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
           <div class="col-md-7">
             <form class="form-horizontal" method="post" action="{{ url('admin/announcement-add') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                 <label class="col-sm-2 control-label">标题</label>
                 <div class="col-sm-10">
                   <input type="text" name="title" class="form-control" placeholder="请输入公告标题">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">内容</label>
                 <div class="col-sm-10">
                   <textarea name="content" class="form-control" placeholder="请输入公告内容" rows="10"></textarea>
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
