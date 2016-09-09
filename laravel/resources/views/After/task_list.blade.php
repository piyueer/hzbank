@extends('header')

@section('content')

            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-purple">
                            <div class="panel-heading">
                                <h3 class="panel-title">任务列表</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>任务名</th>
                                                        <th>用户名</th>
                                                        <th>开始时间</th>
                                                        <th>状态</th>
                                                        <th>操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="zxc">
                                                    @foreach($result as $v)
                                                        <tr>
                                                            <td>{{$v['id']}}</td>
                                                            <td>{{$v['taskName']}}</td>
                                                            <td>{{$v['name']}}</td>
                                                            <td><?php echo date("Y年m月d日 H时i分",$v['startTime']) ?></td>
															<td><?php echo $v['taskStatusMsg'] ?></td>
                                                            <td>
                                                                <button class="btn btn-inverse btn-xs m-b-5" onclick="location.href='{{url('After/taskdelete')}}?id={{$v['id']}}'" >删除任务</button>
																<?php if($v['taskStatus'] == '已完成'){ ?>
                                                                <button class="md-trigger btn  btn-info btn-xs m-b-5" onclick="location.href='{{url('After/taskdetails')}}?id={{$v['id']}}'" >查看详细</button>
																<?php } ?>
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
						<button class="md-trigger btn btn-success w-lg m-b-5" data-toggle="modal" data-target="#myModal">添加任务</button>
                    </div>
                </div>
  


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               添加任务
            </h4>
		</div>
		 
        <div class="modal-body">
			<div class="form-group">
			<form role="form" action="{{url('After/exceldemo')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<label class="text-info">下载Excel文件demo:</label><br/>
				<input type="submit" class="btn btn-success" style="float:left" name="submit" value="下载"/>
			</form>
			</div><br/><br/><br/>

			<form role="form" action="{{url('After/taskjob')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="name" value="{{Session::get('name')}}">
				<div class="form-group">
					<label for="taskname" class="text-info">任务名:</label><br/>
					<input type="text" class="form-control" name="taskName" placeholder="请输入任务名" required/>
				</div><br/>
				
				<div class="form-group">
					<label for="inputfile" class="text-info">请上传需要核查的Excel文件:</label><br/>
					<input type="file" name="excelUpload" required/>
				</div>
		 
		</div>
		
        <div class="modal-footer">
				<button type="button" class="btn btn-default" 
				   data-dismiss="modal">关闭
				</button>
				<input type="submit" class="btn btn-success" name="submit" value="开始任务"/>
			</form>   
					
			
			
		</div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
  
  
@endsection