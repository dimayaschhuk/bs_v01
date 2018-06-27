<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>



    @if ( ''.$_SERVER['REQUEST_URI'].''==='/user/cabinet')
        <li class="active">
    @else
        <li >

    @endif
        <a href="{{url('user/cabinet')}}">
            <i class="fa fa-dashboard"></i> <span>Кабинет</span>
        </a>
    </li>

        @if ( $_SERVER['REQUEST_URI']==='/user/games')
            <li class="active">
        @else
            <li >
                @endif
        <a href="{{url('user/games')}}">
            <i class="fa fa-th"></i> <span>Игры</span>
        </a>
    </li>

            @if ( $_SERVER['REQUEST_URI']==='/user/finance')
                <li class="active">
            @else
                <li >
                    @endif
        <a href="{{url('user/finance')}}">
            <i class="fa fa-money"></i> <span>Финанси</span>
        </a>
    </li>

 @if ( $_SERVER['REQUEST_URI']==='/user/statistic')
                    <li class="active">
 @else
                    <li >@endif
        <a href="{{url('user/statistic')}}">
            <i class="fa fa-gpu"></i> <span>Статистика</span>
            <span class="pull-right-container">

				</span>

        </a>
    </li>




    {{--<br><br><br><br><br><br><br><br><br><br><br>--}}



</ul>
