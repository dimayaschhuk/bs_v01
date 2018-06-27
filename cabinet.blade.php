
@include('site.header')
<div id="app">



    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a  class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Cabinet</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Cabinet</b></span>
            </a>

            <!--- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <div class="row">
                <div class="col-xs-1 ">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </div>
                <div class="col-xs-1 offset-6" style="margin-top: 10px">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>


                </div>
                <div class="col-xs-1 " style="margin-top: 10px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                </div>

                <div class="col-xs-1 " style="margin-top: 10px">
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>

                    </li>
                </div>
                <div class="col-xs-1 " style="margin-top: 5px">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <out></out>

                    </li>
                </div>
                <div class="col-xs-1 " style="margin-top: 10px">
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </div>

            </div>

            <!-- Navbar Right Menu -->

            <!-- Messages: style can be found in dropdown.less-->

            <!-- Notifications: style can be found in dropdown.less -->

            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->

            <!-- Control Sidebar Toggle Button -->

            </ul>



        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>

                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <nav_bar :category='{{json_encode($category)}}'></nav_bar>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{--<div class="row" >--}}

                {{--<div class="col-xs-11 offset-1">  <slider></slider>       </div>--}}



            {{--</div>--}}
            <br>    <br>    <br>
            <div class="row">
                <div class="col-xs-9" style=" margin: 0px 10px">
                  <current_games :open_for_registration='{{json_encode($open_for_registration)}}'></current_games>
                </div>
                <div class="col-xs-2">
                  <block_money></block_money>
                </div>
            </div>







        </div>

        <script src="{{asset('adminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('adminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap  -->
        <script src="{{asset('adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset('adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('adminLTE/bower_components/chart.js/Chart.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('adminLTE/dist/js/pages/dashboard2.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('adminLTE/dist/js/demo.js')}}"></script>
    </div>
@include('site.footer')












