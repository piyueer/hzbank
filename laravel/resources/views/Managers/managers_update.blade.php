@extends('header')

@section('content')
            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">管理员信息修改</h3>
                            </div>
                            <div class="panel-body">
                            
                                <form class="form-horizontal" id="update" role="form" method="post" action="{{url('Managers/update')}}/{{$result->id}}">
                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >姓名</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                                                <input type="text"  name="name" class="form-control" disabled="true"
                                                    placeholder="姓名" value="{{$result->name}}">
                                            </div>
                                        </div>


                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >用户名</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                                <input type="text" id="username" name="username" class="form-control" disabled="true"
                                                    placeholder="用户名" value="{{$result->username}}">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >请输入新密码</label>
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
                                      <button type="submit" class="btn btn-warning w-lg m-b-5">修  改</button>
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
        $("#update").validate({
            onfocusout: function(element){ 
                $(element).valid() 
            },
             rules: {
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
                    password: {
                        required: "*请输入新密码",
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