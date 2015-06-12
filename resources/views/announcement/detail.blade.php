@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        系统公告
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li>系统公告</li>
         <li class="active">{{ $data->title }}</li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
         <div class="box-body">
           <h3>{{ $data->title }}</h3>
           <small>{{ $data->updated_at->toDateTimeString() }}</small>
           <hr>
           <div>{!! $data->content !!}</div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
