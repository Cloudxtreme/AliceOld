@extends('app')

@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        财务记录 <small>下面是您的财务操作记录</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="/"><i class="fa fa-dashboard"></i> 控制面板</a></li>
         <li>Member</li>
         <li class="active">财务记录</li>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">
             当前信息
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
           <p>您的账号内现有 {{ Auth::user()->charge }} {{ App\Setting::find('charge_name')->value }}</p>
           <p>充值暂时请联系客服</p>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
       
       <div class="box box-primary">
         <div class="box-header with-border">
           <h3 class="box-title">
             财务记录
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
           <table class="table table-hover">
             <thead>
               <tr>
                 <th>#</th>
                 <th>类型</th>
                 <th>资金变动</th>
                 <th>备注</th>
                 <th>时间</th>
               </tr>
             </thead>
             <tbody>
               @if (count($logs) > 0)
                 @foreach ($logs as $log)
                 <tr>
                   <td>{{ $log->id }}</td>
                   <td>{{ $log->type }}</td>
                   <td>{{ $log->amount }}</td>
                   <td>{{ $log->remark }}</td>
                   <td>{{ $log->created_at->toDateTimeString() }}</td>
                 </tr>
                 @endforeach
               @else
               <tr>
                 <td colspan="5">没有查询到数据</td>
               </tr>
               @endif
             </tbody>
           </table>
           <div class="text-center">{!! $logs->render() !!}</div>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </section><!-- /.content -->
@stop
