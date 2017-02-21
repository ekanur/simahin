<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Informasi Mahasiswa Internasional | Universitas Negeri Malang</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{url("/assets/css/bootstrap.min.css")}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{url("/assets/css/animate.min.css")}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url("/assets/css/light-bootstrap-dashboard.css")}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{url("/assets/css/demo.css")}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="{{url("/assets/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{url("/assets/css/pe-icon-7-stroke.css")}}" rel="stylesheet" />

    @yield("css")
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="{{ url('/assets/img/graca.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url("/")}}" class="simple-text">
                    Hubungan Internasional
                </a>
            </div>

            <ul class="nav">
            
            @if (Request::is('/')||Request::is('index'))
                <li class="active">
            @else
                <li>
            @endif
                
                    <a href="{{url("/")}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @if (Request::is('user')||Request::is('user/*'))
                <li class="active">
            @else
                <li>
            @endif
                    <a href="{{url("/user")}}">
                        <i class="pe-7s-user"></i>
                        <p>Tamu Internasional</p>
                    </a>
                </li>
            @if (Request::is('notifikasi')||Request::is('notifikasi/*'))
                <li class="active">
            @else
                <li>
            @endif
                    <a href="{{ url('/notifikasi') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Notifikasi</p>
                    </a>
                </li>
                {{--<li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li> --}}
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input name="q" type="text" value="" class="form-control" placeholder="Cari nama...">
                        </div>
                    </form>
                   {{--  <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul> --}}

                    <ul class="nav navbar-nav navbar-right">
                   {{--      <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> --}}
                        <li>
                            <a href="{{url("/")}}/logout">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            @yield('content')
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    {{-- <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul> --}}
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.ptik.um.ac.id">PTIK Universitas Negeri Malang</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ url('/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="{{ url('/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ url('/assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ url('/assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ url('/assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ url('/assets/js/light-bootstrap-dashboard.js') }}"></script>

	 {{-- Light Bootstrap Table DEMO methods, don't include it in your project!  --}}
	<script src="{{ url('/assets/js/demo.js') }}"></script>

    @yield("js")

	

</html>
