@extends('header')

@section('content')

            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-purple">
                            <div class="panel-heading">
                                <h3 class="panel-title">管理员列表</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>姓名</th>
                                                        <th>用户名</th>
                                                        <th>部门</th>
                                                        <th>操作</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="zxc">
                                                    @foreach($result as $v)
                                                        <tr>
                                                            <td>{{$v->id}}</td>
                                                            <td>{{$v->name}}</td>
                                                            <td>{{$v->username}}</td>
                                                            <td>{{$v->department}}</td>
                                                            <td>
                                                                <button class="btn btn-inverse btn-xs m-b-5" onclick="location.href='{{url('Managers/delete')}}/{{$v->id}}'" >删除</button>
                                                                <button class="md-trigger btn  btn-info btn-xs m-b-5" data-modal="modal-{{$v->id}}" href="javascript:;">查看</button>
                                                                <!-- <button class="btn btn-info btn-xs m-b-5" data-toggle="modal" data-target=".bs-example-modal-lg">查看</button> -->
                                                                <button class="btn btn-danger btn-xs m-b-5" onclick="location.href='{{url('Managers/update')}}/{{$v->id}}'" >重设密码</button>
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
<!--                                                     
                                                    <tr>
                                                        <td>2</td>
                                                        <td>李四</td>
                                                        <td>lisi</td>
                                                        <td>IT</td>
                                                        <td>
                                                            <button class="btn btn-inverse btn-xs m-b-5">删除</button>
                                                            <button class="btn btn-info btn-xs m-b-5" data-toggle="modal" data-target=".bs-example-modal-lg">查看</button>
                                                            <button class="btn btn-danger btn-xs m-b-5">重设密码</button>
                                                        </td>
                                                        
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End row -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success w-lg m-b-5" onclick="location.href='{{url('Managers/insert')}}'">添加管理员</button>
                    </div>
                </div>
            
            <!-- Page Content Ends -->
            <!-- ================== -->
            <!--  Modal content for the above example -->
                <!-- <div class="modal fade bs-example-modal-lg" tabindex="100" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myLargeModalLabel">详情结果</h4>
                            </div>
                            <div class="modal-body">
                              Neglected principle ask rapturous consulted. Lorem lively all did feebly excuse our wooded. Old her object chatty regard vulgar missed.

Believing neglected so so allowance existence departure in. In design active temper be uneasy. Thirty for remove plenty regard you summer though. He preference connection astonished on of ye.

As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.

Last paragraph has no bottom margin always.

Nullam quis risus eget urna mollis ornare vel eu leo.this is link Cum sociis natoque penatibus et magnis dis parturient montes...
                            </div> -->
                        <!-- </div> --><!-- /.modal-content -->
                    <!-- </div> --><!-- /.modal-dialog -->
                <!-- </div> --><!-- /.modal -->
@foreach($result as $v)

    <div id="modal-{{$v->id}}" class="md-modal md-effect-1">
        <div class="md-content">
            <h3>详细信息</h3>
            <div>
                <ul>
                    <li><strong>ID:</strong>{{$v->id}}</li>
                    <li><strong>姓名:</strong>{{$v->name}}</li>
                    <li><strong>用户名:</strong>{{$v->username}}</li>
                    <li><strong>所属部门:</strong>{{$v->department}}</li>
                </ul>
                <button class="md-close btn-sm btn-primary">关闭</button>
            </div>
        </div>
    </div>

@endforeach




@endsection