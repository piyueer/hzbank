@extends('header')

@section('content')

            <div class="wraper container-fluid">
                
                <div class="row">
                    <div class="col-sm-12">
                       
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">核查结果</h3> 
                            </div> 
                            <div class="panel-body"> 
                                <table class="table table-condensed">
                                    
                                    <tbody>
                                        <tr>
                                            <td><b>姓名：</b></td>
                                            <td>
                                            {{ $result['customerName'] }}
                                            </td>
                                            <td><b>检查类型：</b></td>
                                            <td>
                                            贷后
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>身份证号码：</b></td>
                                            <td>
                                            {{ $result['cardID'] }}
                                            </td>
                                            <td><b>最近核查时间：</b></td>
                                            <td>
                                            <?php echo date("Y年m月d日 H时i分s秒") ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>验证码：</b></td>
                                            <td>
                                            {{ $result['authcode'] }}
                                            </td>
                                            <td><b>核查人：</b></td>
                                            <td>
                                            {{Session::get('name')}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
              
                    </div>
                    </div> <!-- col -->
                </div> <!-- End row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h3 class="panel-title">Contextual Table</h3>
                            </div> -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>项目</th>
                                                    <th>核验值</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
											<input id="billScore" type="hidden" value="{{ $result['billScore'] }}"/>
											<input id="roamingStatusScore" type="hidden" value="{{ $result['roamingStatusScore'] }}"/>
											<input id="communicationRecordScore" type="hidden" value="{{ $result['communicationRecordScore'] }}"/>											
                                                <tr class="active">
                                                    <td></td>
                                                    <td>用户基本信息</td>
                                                    <td></td>   
                                                </tr>
                                                <tr class="success">
                                                    <td>1</td>
                                                    <td>手机，姓名，身份证一致性</td>
                                                    <td>{{ $result['idMatched'] }}</td>                                                 
                                                </tr>
												<?php if( $result['idMatchedValue'] == 1 ){ ?>
												<tr class="active">
                                                    <td></td>
                                                    <td>用户账单信息</td>
                                                    <td>{{ $result['billScore'] }}分</td>                                                  
                                                </tr>												
                                                <tr class="success">
                                                    <td>2</td>
                                                    <td>用户原注册手机通话时长</td>
                                                    <td>{{ $result['oldNumberUsed'] }}</td>                                            
                                                </tr>
                                                <tr class="success">
                                                    <td>3</td>
                                                    <td>语音消费档次</td>
                                                    <td>{{ $result['voiceBillLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="success">
                                                    <td>4</td>
                                                    <td>数据消费档次</td>
                                                    <td>{{ $result['dataBillLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="success">
                                                    <td>5</td>
                                                    <td>SP消费档次</td>
                                                    <td>{{ $result['spBillLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="danger">
                                                    <td>6</td>
                                                    <td>欠费次数</td>
                                                    <td>{{ $result['billOverDueLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="active">
                                                    <td></td>
                                                    <td>用户漫游状态</td>
                                                    <td>{{ $result['roamingStatusScore'] }}分</td>                                                  
                                                </tr>
                                                <tr class="success">
                                                    <td>7</td>
                                                    <td>忙时所在区域</td>
                                                    <td>{{ $result['busyLoc'] }}</td>                                         
                                                </tr>
                                                <tr class="success">
                                                    <td>8</td>
                                                    <td>闲时所在区域</td>
                                                    <td>{{ $result['freeLoc'] }}</td>                                                  
                                                </tr>
                                                <tr class="danger">
                                                    <td>9</td>
                                                    <td>赌博高危区域漫游档次</td>
                                                    <td>{{ $result['casinoAreaLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="active">
                                                    <td></td>
                                                    <td>用户通信记录</td>
                                                    <td>{{ $result['communicationRecordScore'] }}分</td>                                                  
                                                </tr>
                                                <tr class="danger">
                                                    <td>10</td>
                                                    <td>不良关键字搜索次数</td>
                                                    <td>{{ $result['badWordsSearchLevel'] }}</td>                                                  
                                                </tr>
                                                <tr class="success">
                                                    <td>11</td>
                                                    <td>过去一周关机时长</td>
                                                    <td>{{ $result['powerOffTime'] }}</td>                                                  
                                                </tr>
                                                <tr class="success">
                                                    <td>12</td>
                                                    <td>用户通话圈变化</td>
                                                    <td>{{ $result['frequentNumberChanged'] }}</td>
                                                </tr>
 												<tr class="active">
                                                    <td></td>
                                                    <td>整体得分</td>
                                                    <td>{{ $result['compositeScore'] }}分</td>                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark">
                                    雷达图
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet5"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet5" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <canvas id="radarAfter" data-type="Radar" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-offset-8 col-sm-">
                          <button class="btn btn-warning w-lg m-b-5">返 回</button>
                        </div>     

                    </div>
					<?php } ?>
                </div> <!-- End Row -->

               
@endsection