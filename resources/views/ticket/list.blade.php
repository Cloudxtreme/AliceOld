@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        我的工单 <small>下面是您提交的工单</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li>Ticket</li>
         <li class="active">我的工单</li>
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
                 <th>最后回复</th>
                 <th>状态</th>
                 <th>创建</th>
                 <th>更新时间</th>
               </tr>
             </thead>
             <tbody>
               @if (count($datas) > 0)
                 @foreach ($datas as $data)
                 <tr>
                   <td>{{ $data->id }}</td>
                   <td>
                     <a href="{{ url('ticket/detail/' . $data->id) }}">{{ $data->title }}</a>
                   </td>
                   <td>{{ \App\User::find($data->last_post)->name }}</td>
                   <td>
                     @if ($data->status == 'admin')
                     等待管理员回复
                     @elseif ($data->status == 'user')
                     等待用户回复
                     @elseif ($data->status == 'closed')
                     关闭
                     @else
                     未知
                     @endif
                   </td>
                   <td>{{ $data->created_at->toDateTimeString() }}</td>
                   <td>{{ $data->updated_at->toDateTimeString() }}</td>
                 </tr>
                 @endforeach
               @else
               <tr>
                 <td colspan="6">没有查询到数据</td>
               </tr>
               @endif
             </tbody>
           </table>
           <div class="text-center">{!! $datas->render() !!}</div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
