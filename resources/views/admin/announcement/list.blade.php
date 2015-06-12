@extends('admin')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>系统公告 <a href="{{ url('admin/announcement-add') }}"><i class="fa fa-plus"></i></a></h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 管理面板</a></li>
         <li>系统公告</li>
         <li class="active">列表</li>
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
           <table class="table table-hover">
             <thead>
               <tr>
                 <th>#</th>
                 <th>标题</th>
                 <th>创建时间</th>
                 <th>更新时间</th>
               </tr>
             </thead>
             <tbody>
               @if (count($datas) > 0)
                 @foreach ($datas as $data)
                 <tr>
                   <td>{{ $data->id }}</td>
                   <td>
                     <a href="{{ url('/admin/announcement/' . $data->id) }}">{{ $data->title }}</a>
                   </td>
                   <td>{{ $data->created_at->toDateTimeString() }}</td>
                   <td>{{ $data->updated_at->toDateTimeString() }}</td>
                 </tr>
                 @endforeach
               @else
               <tr>
                 <td colspan="4">没有查询到数据</td>
               </tr>
               @endif
             </tbody>
           </table>
           <div class="text-center">{!! $datas->render() !!}</div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
