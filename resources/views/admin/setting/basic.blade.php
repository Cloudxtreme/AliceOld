@extends('admin')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        基本设置
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> 管理面板</a></li>
        <li>Setting</li>
        <li class="active">基本设置</li>
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
         <div class="box-body">
           <div class="col-md-7">
             <form class="form-horizontal" method="post" action="{{ url('admin/setting-basic') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                 <label class="col-sm-2 control-label">网站标题</label>
                 <div class="col-sm-10">
                   <input type="text" name="sitename" class="form-control" placeholder="请输入网站标题" value="{{ \App\Setting::find('sitename')->value }}">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">网站地址</label>
                 <div class="col-sm-10">
                   <input type="text" name="siteurl" class="form-control" placeholder="请输入网站地址" value="{{ \App\Setting::find('siteurl')->value }}">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">积分名称</label>
                 <div class="col-sm-10">
                   <input type="text" name="charge_name" class="form-control" placeholder="请输入积分名称" value="{{ \App\Setting::find('charge_name')->value }}">
                 </div>
               </div>
               <div class="form-group">
                 <label class="col-sm-2 control-label">提示信息</label>
                 <div class="col-sm-10">
                   <textarea name="notice" class="form-control" placeholder="请输入控制面板提示信息" rows="10">{{ \App\Setting::find('notice')->value }}</textarea>
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
