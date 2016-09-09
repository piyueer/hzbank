@extends('header')

@section('content')

            <div class="wraper container-fluid">
                <div class="page-title"> 
                    <h3 class="title">欢迎您 !</h3> 
                </div>

                <!-- Input groups -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-color panel-success">
                            <div class="panel-heading"><h3 class="panel-title">请确认以下信息的正确性</h3></div>
                            <div class="panel-body">
                            
                                <form class="form-horizontal" action="{{url('After/singleresult')}}" method="post">
                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >姓名</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
											<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text"  name="customerName" class="form-control" placeholder="姓名">
                                            </div>
                                        </div>


                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >手机号码</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                                                <input type="text" name="phoneNumber"  class="form-control" placeholder="手机号码">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >身份证号码</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                                                <input type="text" name="cardID"  class="form-control" placeholder="身份证号码">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >授权码</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
                                                <input type="text"  name="authcode" class="form-control" placeholder="授权码">
                                            </div>
                                        </div>
                                       
                                    </div> <!-- form-group -->
                                    
                                    <div class="col-sm-offset-8 col-sm-">
                                      <button type="submit" class="btn btn-info">核 查</button>
                                    </div>     



                                </form>
                            
                           </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->

@endsection