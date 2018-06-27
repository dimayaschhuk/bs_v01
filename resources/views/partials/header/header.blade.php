<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>B</b>S') !!}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{!! config('adminlte.logo', '<b>B</b>S') !!}</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      @if(!isset(Auth::user()->email))
        <a href="#" style="color: white; float:right; margin-top: 12px; margin-right: 12px;">Вход в личный кабинет</a>
      @else

        @include('partials.header.navbar-right')
      @endif

    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      {{--<div class="user-panel">--}}
        {{--<div class="pull-left info">--}}
          {{--<p>@php if(isset(Auth::user()->email)) { echo Auth::user()->email; } else { echo ''; }  @endphp</p>--}}
          {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
        {{--</div>--}}
      {{--</div>--}}
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

      @include('partials.header.sitebar-menu')

    </section>
  </aside>
