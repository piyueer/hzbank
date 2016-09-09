@extends('header')

@section('content')

<?php $gender = isset($gender) ? $gender : 'all'; ?>
            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-sm-12">
                       
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">近期贷前核查记录</h3> 
                            </div> 
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="">                                    
                                    <div class="form-group col-md-5">
                                        <label class="col-md-2 control-label">姓名</label>
                                        <div class="col-md-10">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="text" name="customerName" class="form-control" placeholder="姓名">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label class="col-md-2 control-label">身份证号码</label>
                                        <div class="col-md-10">
                                            <input type="text" name="cardID" class="form-control" placeholder="身份证号码">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-5">
                                        <label class="col-md-3 control-label">验证时间从:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="startTime" placeholder="mm/dd/yyyy" id="datepicker">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>                                      
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="col-md-2 control-label">至：</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="endTime" placeholder="mm/dd/yyyy" id="datepicker2">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="col-md-3 control-label">性别</label>
                                        <div class="col-md-9">
                                            <div class="radio-inline">
                                                <label class="cr-styled">
                                                    <input type="radio"  name="gender" value="male" @if($gender == 'male') checked="checked" @endif> 
                                                    <i class="fa"></i>
                                                    男 
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label class="cr-styled">
                                                    <input type="radio"  name="gender" value="female" @if($gender == 'female') checked="checked" @endif> 
                                                    <i class="fa"></i> 
                                                    女
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label class="cr-styled">
                                                    <input type="radio"  name="gender" value="all" @if($gender == 'all') checked="checked" @endif> 
                                                    <i class="fa"></i> 
                                                    全部
                                                </label>
                                            </div>
                                        </div>
                                    </div> <!-- form-group -->
                                    <div class="form-group col-md-5">
                                        <button type="submit" class="btn btn-danger btn-rounded m-b-5">搜 索</button>
                                    </div>
                                    
                                </form>
                            </div> <!-- panel-body --> 
              
                    </div>
                    </div> <!-- col -->
                </div> <!-- End row -->
        @if(!empty($result))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-color panel-purple">
							<div class="panel-heading"> 
                                <h3 class="panel-title">查询结果</h3> 
                            </div>
                        <div class="panel-body"> 
							
                            <table id="queryResults" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>姓名</th>
										<th>身份证号码</th>
										<th>信用模型得分</th>
										<th>查看详细</th>
									</tr>
								</thead>
								
								<tbody>
									@foreach($result as $v)
										<tr>
											<td>{{ $v->customerName }}</td>
											<td>{{ $v->cardID }}</td>
											<td>{{ $v->compositeScore }}</td>
											<td>{{ $v->uid }}</td> 
										</tr>
									@endforeach   
                                </tbody>
							</table>
							
                        </div> 

                        <div class="row"> 
							<div class="col-md-12">
								<div id="excelexport"></div>
							</div>    
                        </div>
                   
                        </div>
                    </div>
                </div> <!-- End row -->
        @endif
@endsection


@section('jquery')

<script type="text/javascript">
/* ==============================================
	 Counter Up
	 =============================================== */
	jQuery(document).ready(function($) {
		//$('#datatable').dataTable();
		$('.counter').counterUp({
			delay: 100,
			time: 1200
		});


		// Time Picker
		jQuery('#timepicker').timepicker({defaultTIme: false});
		jQuery('#timepicker2').timepicker({showMeridian: false});
		jQuery('#timepicker3').timepicker({minuteStep: 15});

		// Date Picker
		jQuery('#datepicker').datepicker();
		jQuery('#datepicker-inline').datepicker();
		jQuery('#datepicker-multiple').datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});

		jQuery('#datepicker2').datepicker();
		jQuery('#datepicker2-inline').datepicker();
		jQuery('#datepicker2-multiple').datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
		});
	});
</script>

<script type="text/javascript">
	      
$(document).ready(function() {
	var table = $('#queryResults').DataTable( {

		"order": [[ 2, 'asc' ]],

		"columnDefs": [
		{ "width": "25%", "targets": 0 },
		{ "width": "25%", "targets": 1 },
		{ "width": "25%", "targets": 2 },
		{ "width": "25%","orderable": false, "targets": 3,  
			render: function (data, type, row, meta) {
				return "<a class='md-trigger btn  btn-info btn-xs m-b-4' href='{{url('Before/singledetails')}}?uid=" + data + "'>查看详细</a>";
			} 
		}
		],

		"processing": true,

		"language": {
			lengthMenu: '<select class="form-control input-xsmall">' + '<option value="1">1</option>' + '<option value="10">10</option>' + '<option value="20">20</option>' + '<option value="30">30</option>' + '<option value="40">40</option>' + '<option value="50">50</option>' + '</select>&nbsp;条记录',
            search: '搜索:&nbsp;',
			processing: '<span class="text-success">处理中...</span>',

            paginate: {
                previous: "上一页",
                next: "下一页",
                first: "第一页",
                last: "最后"
			},

            zeroRecords: "没有内容",

            info: "总共_PAGES_ 页，显示第_START_ 到第 _END_ ，筛选之后得到 _TOTAL_ 条，初始_MAX_ 条 ",
            infoEmpty: "0条记录",
            infoFiltered: ""
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