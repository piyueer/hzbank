@extends('header')

@section('content')

            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-purple">
                            <div class="panel-heading">
                                <h3 class="panel-title">任务详细信息</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                   
										<div class="panel-body"> 
										
											<input type="hidden" id="taskId" value="{{ $taskId }}">
											
											<table id="taskDetails" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>姓名</th>
														<th>身份证号码</th>
														<th>信用模型得分</th>
														<th>查看详细</th>
													</tr>
												</thead>
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
						<div id="excelexport"></div>
                    </div>
                </div>
</div>
  
  
@endsection


@section('jquery')

<script type="text/javascript">	      
$(document).ready(function() {
	var table = $('#taskDetails').DataTable( {

		"order": [[ 2, 'asc' ]],

		"columnDefs": [
		{ "width": "25%","orderable": false, "targets": 0 },
		{ "width": "25%","orderable": false, "targets": 1 },
		{ "width": "25%","orderable": false, "targets": 3,  
			render: function (data, type, row, meta) {
				return "<a class='md-trigger btn  btn-info btn-xs m-b-4' href='singledetails?uid=" + data + "'>查看详细</a>";
			} 
		}
		],

		"processing": true,
        "serverSide": true,
		
		"ajax": {
			"url": '{!! route('datatables.taskdatabefore') !!}',
			"data": function ( d ) {
				d.taskId = $('#taskId').val()
			}
		  },
 

		"language": {
			lengthMenu: '<select class="form-control input-xsmall">' + '<option value="1">1</option>' + '<option value="10">10</option>' + '<option value="20">20</option>' + '<option value="30">30</option>' + '<option value="40">40</option>' + '<option value="50">50</option>' + '</select>&nbsp;条记录',//左上角的分页大小显示
            search: '搜索:&nbsp;',//右上角的搜索文本
			processing: '<span class="text-success">处理中...</span>',

            paginate: {//分页的样式内容
                previous: "上一页",
                next: "下一页",
                first: "第一页",
                last: "最后"
			},

            zeroRecords: "没有内容",//table tbody内容为空时,tbody的内容
            //下面三者构成了总体的左下角的内容
            info: "总共_PAGES_ 页，显示第_START_ 到第 _END_ ，筛选之后得到 _TOTAL_ 条，初始_MAX_ 条 ",//左下角的信息显示
            infoEmpty: "0条记录",//筛选为空时左下角的显示
            infoFiltered: ""//筛选之后的左下角筛选提示
        },		
		

	} );

	new $.fn.dataTable.Buttons( table, {
	
		buttons: [
			{extend: 'excel', text: '导出记录', className: 'btn btn-success w-lg m-b-5'}
		]

	} );

	table.buttons().container()
		.appendTo( '#excelexport' );

} );
</script>
		
@endsection