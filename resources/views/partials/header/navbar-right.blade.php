<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">@php if(isset(Auth::user()->email)) { echo Auth::user()->email; } else { echo ''; }  @endphp</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  @php if(isset(Auth::user()->email)) { echo Auth::user()->email; } else { echo ''; }  @endphp
                  <small>@php if(isset(Auth::user()->created_at)) { echo Auth::user()->created_at; } else { echo ''; }  @endphp</small>
                </p>
              </li>
              <!-- Menu Body -->

              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Referals</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Payout history</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('out')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
{{----}}