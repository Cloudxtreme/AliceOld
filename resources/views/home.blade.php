@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ App\Setting::find('sitename')->value }} <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li class="active">首页</li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">系统提示</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          {{ App\Setting::find('notice')->value }}
        </div><!-- /.box-body -->
      </div><!-- /.box -->
     </section><!-- /.content -->
@stop
