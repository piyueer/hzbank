@extends('header')

@section('content')
            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">新增管理员</h3>
                            </div>
                            <div class="panel-body">
                            
                                <form class="form-horizontal" id="insert" role="form" method="post" action="{{ url('Managers/insert') }}">
                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >姓名</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                                                <input type="text"  name="name" class="form-control" placeholder="姓名">
                                            </div>
                                        </div>


                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >用户名</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                <input type="text" id="username" name="username" class="form-control" placeholder="用户名">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >密码</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input  class="form-control" id="password" name="password" type="password" placeholder="密码">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >再次输入密码</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input class="form-control"  name="password2" type="password" placeholder="再次输入密码">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >部门</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                                <select name="department" class="form-control">
                                                    <option value="风控部门">风控部门</option>
                                                    <option value="管理部门">管理部门</option>
                                                    <option value="银行开发人员">银行开发人员</option>
                                                    <option value="移动公司">移动公司</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->

                                    
                                    
                                    <div class="col-sm-offset-2 col-sm-">
                                      <button type="submit" class="btn btn-warning w-lg m-b-5">创  建</button>
                                    </div>     



                                </form>
                            
                           </div> <!-- panel-body -->
                        </div>
                    </div>
                </div> <!-- End row -->
   
@endsection


@section('jquery')

<script type="text/javascript">
    $(document).ready(function(){
        $("#insert").validate({
            onfocusout: function(element){ 
                $(element).valid() 
            },
             rules: {
                name: {
                    required: true
                },
                username: {
                    required: true,
                    remote: {
                        type: "post",
                        url: "<?php echo url('Managers/insert') ?>",
                        data: {
                            username: function () {
                                return $("#username").val();
                            },
                            _token:function() {
                                return $("#_token").val();
                            }
                        },
                        dataType: "html",
                        dataFilter: function (data, type) {
                            if (data == "true") { 
                                return false; 
                            }
                            else { 
                                return true; 
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength:8,
                },
                password2: {
                    required: true,
                    minlength:8,
                    equalTo:"#password"
                }
            }, 
             messages: {
                    name:{
                        required: "*请输入姓名"
                    },
                    username:{
                        required: "*请输入用户名",
                        remote: "*该用户名已存在"
                    },
                    password: {
                        required: "*请输入密码",
                        minlength: "*密码不能小于8个字符"
                    },
                    password2: {
                        required: "*请输入确认密码",
                        minlength: "*密码不能小于8个字符",
                        equalTo: "*两次输入密码不一致"
                    }
            }
        })
    })
</script> 

@endsection