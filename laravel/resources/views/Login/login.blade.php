<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="{{URL::asset('img/favicon_1.ico')}}">

        <title>杭州银行移动大数据风险管控系统</title>

        <!-- Bootstrap core CSS -->
        <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap-reset.css')}}" rel="stylesheet">

        <!--Animation css-->
        <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="{{URL::asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{URL::asset('assets/morris/morris.css')}}">

        <!-- Custom styles for this template -->
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/helper.css')}}" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>

<!-- <a class="md-trigger btn btn-primary btn-sm" data-modal="modal-2" href="javascript:;">Show Me </a>
<div id="modal-2" class="md-modal md-effect-2">
<div class="md-content">
<h3>注意</h3>
<div>
    <p>用户名或密码错误</p>
<button class="md-close btn-sm btn-primary">关闭</button>
</div>
</div>
</div> -->

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading"> 
                   <h3 class="text-center m-t-10"> <strong>登 录</strong> </h3>
                </div> 

                <form class="form-horizontal m-t-40" method="post" action="{{ url('Login/login') }}" >
                                            
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input class="form-control" name="username" type="text" placeholder="用户" oninvalid="setCustomValidity('用户名必须填写！');" 
                            value="{{isset($_COOKIE['username']) ? $_COOKIE['username'] : ''}}" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" placeholder="密码" oninvalid="setCustomValidity('密码必须填写！');" 
                            value="{{isset($_COOKIE['password']) ? $_COOKIE['password'] : ''}}" required>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label class="cr-styled">
                                <input type="checkbox" name="checked" checked>
                                <i class="fa"></i> 
                                记住我
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group text-right">
                        <div class="col-xs-12">
                            <button class="btn btn-purple w-md" id="button" type="submit">登录</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i>忘记密码?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{URL::asset('js/jquery.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/pace.min.js')}}"></script>
        <script src="{{URL::asset('js/wow.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        
        <!--common script for all pages-->
        <script src="{{URL::asset('js/jquery.app.js')}}"></script>

    
    </body>
</html>

