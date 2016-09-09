@extends('header')

@section('content')
        <div class="wraper container-fluid">
            <div class="page-title"> 
                <h3 class="title">欢迎您 !</h3> 
            </div>
            <!-- Row start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">基本情况</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <p class="text-success">在过去的一周内，已经进行了<mark>{{$result_before}}</mark>人次的贷前查询，发现高危情况<mark class="text-danger">{{$result_before_error}}</mark>人次， <a class="text-info" href="{{url('Home/lastweekbefore')}}">点击此处查看</a></p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="text-success">在过去的一周内，已经进行了<mark>{{$result_after}}</mark>人次的贷后查询，发现高危情况<mark class="text-danger">{{$result_after_error}}</mark>人次， <a class="text-info" href="{{url('Home/lastweekafter')}}">点击此处查看</a></p>
                                </li>
                            </ul>

                             
                        </div>
                    </div>
                </div>
            </div><!-- End of Row -->

            <!-- Row start -->
            <div class="row">
                <div class="col-md-12">                        
                        
                        <div class="portlet"><!-- /primary heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark">
                                贷前API调用次数图表：（2条线，一条表示查询数量， 一条表示异常数量）
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet1" class="panel-collapse collapse in">
                            <div class="portlet-body chartJS">
                                <canvas id="lineChart_before" result="{{$result_before_all}}" data-type="Line" width="520" height="250"></canvas>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                   
                </div>
            </div><!-- End of Row -->


            <!-- Row start -->
            <div class="row">
                <div class="col-md-12">                        
                        
                        <div class="portlet"><!-- /primary heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark">
                                贷后API调用次数图表：（2条线，一条表示查询数量， 一条表示异常数量）
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet1" class="panel-collapse collapse in">
                            <div class="portlet-body chartJS">
                                <canvas id="lineChart_after" result="{{$result_after_all}}" data-type="Line" width="520" height="250"></canvas>
                            </div>
                        </div>
                    </div> <!-- /Portlet -->
                   
                </div>
            </div><!-- End of Row -->

           
        <!-- Page Content Ends -->
        <!-- ================== -->
@endsection