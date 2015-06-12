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
         <li class="active">列表</li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
         <div class="box-body">
           <table class="table table-hover">
             <thead>
               <tr>
                 <th>标题</th>
                 <th>时间</th>
               </tr>
             </thead>
             <tbody>
               @if (count($datas) > 0)
                 @foreach ($datas as $data)
                 <tr>
                   <td>
                     <a href="{{ url('announcement/' . $data->id) }}">{{ $data->title }}</a>
                   </td>
                   <td>{{ $data->updated_at->toDateTimeString() }}</td>
                 </tr>
                 @endforeach
               @else
               <tr>
                 <td colspan="2">没有查询到数据</td>
               </tr>
               @endif
             </tbody>
           </table>
           <div class="text-center">{!! $datas->render() !!}</div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
