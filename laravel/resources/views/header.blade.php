<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

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

        <!-- sweet alerts -->
        <link href="{{URL::asset('assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/helper.css')}}" rel="stylesheet">

        <link href="{{URL::asset('assets/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/timepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" />

        <!-- Plugins css -->
        <link href="{{URL::asset('assets/modal-effect/css/component.css')}}" rel="stylesheet">
		
		<link href="{{URL::asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="{{ url('Home/index') }}" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">杭银大数据风控系统</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
            <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="@if($data=='Home') active @endif"><a href="{{url('Home/index')}}"><i class="ion-home"></i> <span class="nav-label">主界面</span></a></li>
                    <li class="@if($data=='Before') active @endif has-submenu"><a href="#"><i class="ion-document"></i> <span class="nav-label">贷前用户核查</span><!-- <span class="badge bg-purple">1</span> --></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('Before/singleindex')}}">单个用户核查</a></li>
                            <li><a href="{{url('Before/tasklist')}}">任务</a></li>                            
                        </ul>
                    </li>
                    <li class="@if($data=='After') active @endif has-submenu"><a href="#"><i class="ion-document-text"></i> <span class="nav-label">贷后用户核查</span><!-- <span class="badge bg-success">New</span> --></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('After/singleindex')}}">单个用户核查</a></li>
                            <li><a href="{{url('After/tasklist')}}">任务</a></li>                     
                        </ul>
                    </li>
                   
                    <li class="@if($data=='Chart') active @endif has-submenu"><a href="#"><i class="ion-stats-bars"></i> <span class="nav-label">统计报表</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('Chart/beforeindex')}}">贷前查询记录</a></li>
                            <li><a href="{{url('Chart/afterindex')}}">贷后查询记录</a></li>                           
                        </ul>
                    </li>

                    <li class="@if($data=='Managers') active @endif has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">工具</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('Managers/index')}}">管理员列表</a></li>
                            <li><a href="{{url('Managers/insert')}}">新建管理员</a></li>                            
                        </ul>
                    </li>
                    <li class="@if($data=='Apis') active @endif has-submenu"><a href="#"><i class="ion-network"></i> <span class="nav-label">开发人员专区</span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{url('Apis/index')}}">API使用文档说明</a></li>                            
                        </ul>                       
                    </li>
                </ul>
            </nav>
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
            <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- Search -->
                <!-- <form role="search" class="navbar-left app-search pull-left hidden-xs">
                  <input type="text" placeholder="搜索..." class="form-control">
                  <a href=""><i class="fa fa-search"></i></a>
                </form> -->
                
                <!-- Left navbar -->
                <nav class=" navbar-default" role="navigation">
                    <!-- <ul class="nav navbar-nav hidden-xs">
                        <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">German</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Italian</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Files</a></li>
                    </ul> -->

                    <!-- Right navbar -->
                    <ul class="nav navbar-nav navbar-right top-menu top-right-menu">  
                        <!-- mesages -->  
                        <!-- <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-envelope-o "></i>
                                <span class="badge badge-sm up bg-purple count">4</span>
                            </a>
                            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                                <li>
                                    <p>Messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-2.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-3.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">3 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><img src="img/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                                        <span class="block"><strong>John smith</strong></span>
                                        <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                                </li>
                            </ul>
                        </li> -->
                        <!-- /messages -->
                        <!-- Notification -->
                        <!-- <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge badge-sm up bg-pink count">3</span>
                            </a>
                            <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                                <li class="noti-header">
                                    <p>Notifications</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                                        <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-diamond fa-2x text-primary"></i></span>
                                        <span>Use animate.css<br><small class="text-muted">5 minutes ago</small></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                                        <span>Send project demo files to client<br><small class="text-muted">1 hour ago</small></span>
                                    </a>
                                </li>
                                
                                <li>
                                    <p><a href="#" class="text-right">See all notifications</a></p>
                                </li>
                            </ul>
                        </li> -->
                        <!-- /Notification -->

                        <!-- user login dropdown start-->
                        <li class="dropdown text-center">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="{{URL::asset('img/avatar-2.jpg')}}" class="img-circle profile-img thumb-sm">
                                <span class="username">{{Session::get('name')}}</span> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                                <!-- <li><a href="profile.html"><i class="fa fa-briefcase"></i>Profile</a></li> -->
                                <li><a href="#"><i class="fa fa-cog"></i> 设置</a></li>
                                <!-- <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li> -->
                                <li><a href="{{url('Login/logout')}}"><i class="fa fa-sign-out"></i>退出</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->       
                    </ul>
                    <!-- End right navbar -->
                </nav>
                
            </header>
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->


            @yield('content')


               
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
            <footer class="footer">
                201 © Hangzhou Bank.
            </footer>
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{URL::asset('js/jquery.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/modernizr.min.js')}}"></script>
        <script src="{{URL::asset('js/pace.min.js')}}"></script>
        <script src="{{URL::asset('js/wow.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{URL::asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/chat/moment-2.2.1.js')}}"></script>

        <!-- Counter-up -->
        <script src="{{URL::asset('js/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('js/jquery.counterup.min.js')}}" type="text/javascript"></script>

        <!-- EASY PIE CHART JS -->
        <script src="{{URL::asset('assets/easypie-chart/easypiechart.min.js')}}"></script>
        <script src="{{URL::asset('assets/easypie-chart/jquery.easypiechart.min.js')}}"></script>
        <script src="{{URL::asset('assets/easypie-chart/example.js')}}"></script>


        <!--C3 Chart-->
        <script src="{{URL::asset('assets/c3-chart/d3.v3.min.js')}}"></script>
        <script src="{{URL::asset('assets/c3-chart/c3.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{URL::asset('assets/morris/morris.min.js')}}"></script>
        <script src="{{URL::asset('assets/morris/raphael.min.js')}}"></script>

        <!-- sparkline --> 
        <script src="{{URL::asset('assets/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/sparkline-chart/chart-sparkline.js')}}" type="text/javascript"></script> 

        <!-- sweet alerts -->
        <script src="{{URL::asset('assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{URL::asset('assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <script src="{{URL::asset('assets/modal-effect/js/classie.js')}}"></script>
        <script src="{{URL::asset('assets/modal-effect/js/modalEffects.js')}}"></script>

        <script src="{{URL::asset('js/jquery.app.js')}}"></script>
        <!-- Chat -->
        <script src="{{URL::asset('js/jquery.chat.js')}}"></script>

        <!-- Chart JS -->
        <script src="{{URL::asset('assets/chartjs/chart.min.js')}}"></script>
        <script src="{{URL::asset('assets/chartjs/chartjs.init.php')}}"></script>

        <script src="{{URL::asset('assets/timepicker/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{URL::asset('assets/timepicker/bootstrap-datepicker.js')}}"></script>

        <script src="{{URL::asset('assets/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('assets/datatables/dataTables.bootstrap.js')}}"></script>

        <!-- Dashboard -->
        <script src="{{URL::asset('js/jquery.dashboard.js')}}"></script>
        <!-- Todo -->
        <script src="{{URL::asset('js/jquery.todo.js')}}"></script>

        <script src="{{URL::asset('js/jquery.validate.js')}}"></script>
		
		<!-- Datatables export-->
		<script src="{{URL::asset('js/dataTables.buttons.js')}}"></script>
		
		<script src="{{URL::asset('js/buttons.bootstrap.js')}}"></script>
		
		<script src="{{URL::asset('js/jszip.min.js')}}"></script>
		
		<script src="{{URL::asset('js/buttons.html5.js')}}"></script>
		
		<script src="{{URL::asset('js/buttons.colVis.js')}}"></script>

		
		<script type="text/javascript">
        /* ==============================================
             Counter Up
             =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
		
		<!--使bootstrap模态框居中-->
        <script type="text/javascript">
		$("[data-toggle='modal']").click(function(){
			var _target = $(this).attr('data-target')
			t=setTimeout(function () {
			var _modal = $(_target).find(".modal-dialog")
			_modal.animate({'margin-top': parseInt(($(window).height() - _modal.height())/2)}, 300 )
			},200)
		})
		</script>

        @yield('jquery')

    </body>
</html>
