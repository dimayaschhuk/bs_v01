@extends('page')

@section('title', 'AMpool.tech')

@section('content')
    aa
      {{--<div class="row">--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-aqua">--}}
            {{--<div class="inner">--}}
              {{--<h3>{{ $stat->farm }}</h3>--}}

              {{--<p>Farms online</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-cube"></i>--}}
            {{--</div>--}}
{{--<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-green">--}}
            {{--<div class="inner">--}}
              {{--<h3>{{ $stat->paid }}--}}


        {{--</h3>--}}

              {{--<p>Already paid BTC</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-social-bitcoin"></i>--}}
            {{--</div>--}}
{{--<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{---->          </div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-yellow">--}}
            {{--<div class="inner">--}}
              {{--<h3>{{ $stat->user }}</h3>--}}

              {{--<p>User Registrations</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-person-add"></i>--}}
            {{--</div>--}}
{{--<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{---->          </div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-3 col-xs-6">--}}
          {{--<!-- small box -->--}}
          {{--<div class="small-box bg-red">--}}
            {{--<div class="inner">--}}
              {{--<h3>{{ $stat->coin }}</h3>--}}

              {{--<p>Supported coins</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
              {{--<i class="ion ion-checkmark-circled"></i>--}}
            {{--</div>--}}
{{--<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{---->          </div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
      {{--</div>--}}
{{--<div class="row">--}}
    {{----}}
            {{--<div class="col-lg-6 col-xs-6">--}}
                          {{--<a href="http://cabinet.ampool.tech/login"><button type="button" class="btn btn-block btn-info btn-lg">Log in</button></a>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6 col-xs-6"> --}}
                        {{--<a href="http://cabinet.ampool.tech/register"><button type="button" class="btn btn-block btn-warning btn-lg">Sign Up</button></a>--}}
            {{--</div>  --}}
{{--</div>      <br>--}}

{{--<div class="row">--}}
        {{----}}
{{--<div class="col-md-4">--}}
          {{--<div class="box box-solid">--}}
            {{--<div class="box-header with-border">--}}
              {{--<h3 class="box-title">Наши возможности</h3>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
              {{--<div class="box-group" id="accordion">--}}
                {{--<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->--}}
                {{--<div class="panel box box-primary">--}}
                  {{--<div class="box-header with-border">--}}
                    {{--<h4 class="box-title">--}}
                      {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">--}}
                        {{--Переключение монет--}}
                      {{--</a>--}}
                    {{--</h4>--}}
                  {{--</div>--}}
                  {{--<div id="collapseOne" class="panel-collapse collapse in">--}}
                    {{--<div class="box-body">--}}
{{--<h4>                      Часто бывает, что доходность по разным монетам меняеться по несколько раз в неделю. Причем эти изминения бывают и 20, 50, 100 а то и 200% от стандартно выбранного вами ETH или ZEC. Но скакать между монетами тоже не очень удобно. Мы же сделаем за Вас переключение Вашых ферм на самый профитній вариант. </h4>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel box box-danger">--}}
                  {{--<div class="box-header with-border">--}}
                    {{--<h4 class="box-title">--}}
                      {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">--}}
                        {{--Автообмен намайненного--}}
                      {{--</a>--}}
                    {{--</h4>--}}
                  {{--</div>--}}
                  {{--<div id="collapseTwo" class="panel-collapse collapse">--}}
                    {{--<div class="box-body">--}}
{{--<h4>                    Профитность по какой-то неизвестной монете выше стабильного эфира в 3 раза? Но смысл хранить неизвестную, спекуляционную монету? Мы обменяем весь Ваш доход в BTC по рыночному курсу (а в скором времени будет введена поддержка обмена и надругие монеты).--}}
{{--</h4>                    </div>--}}
                  {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel box box-success">--}}
                  {{--<div class="box-header with-border">--}}
                    {{--<h4 class="box-title">--}}
                        {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">--}}
                            {{--Мониторинг стабильности--}}
                        {{--</a>--}}
                    {{--</h4>--}}
                  {{--</div>--}}
                  {{--<div id="collapseThree" class="panel-collapse collapse">--}}
                    {{--<div class="box-body">--}}
                      {{--Мы проследим, чтоб майнинг проходил максимально просто и качественно. В случае любых проблем с фермами мы уведомим Вас и поможем их устранить.  --}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
          {{--</div>--}}
          {{--<!-- /.box -->--}}
        {{--</div>--}}
    {{----}}
    {{----}}
{{--<div class="col-md-4">--}}
          {{--<div class="box box-solid">--}}
            {{--<div class="box-header with-border">--}}

              {{--<h3 class="box-title">ПОЧЕМУ ВЫ ВСЕ ЕЩЕ ПОЛУЧАЕТЕ МЕНЬШЕ ЧЕМ МОГЛИ БЫ?</h3>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
                {{--<p>Этот вопрос можно перефразировать. ЗАЧЕМ вам получать меньше, если вы можете поднять свою прибыльность ферм вполь до 100% от теоретически возожной?</p>--}}
				{{----}}
                {{--<p>Думаете, это не реально? Поразмыслите вот над чем:</p>--}}

                {{--<ul>--}}
                    {{--<li>Если у вас остановился майнер - это потери.</li>--}}
                    {{--<li>Если упала цена на валюту, которую вы маните - это тоже потери.</li>--}}
                    {{--<li>Если по техническим причинам пропало интернет-соединение на ферме - это большие потери.</li>--}}
                    {{--<li>Ваши карты на ферме не эффективны при майнинге выбранной валюты - и это огромные потери!</li>--}}
                {{--</ul>--}}
				{{----}}
                {{--<p>Потери, потери, и еще раз потери! ЗАЧЕМ это вам?</p>				--}}
                {{--<p>Присоиденитесь к нам, и вы навсегда забудете про проблемы с мониторингом ферм и колебанием цены криптовалюты, ваши карты будут приносить вам 100% прибыль при учете всех факторов криптовалютноо рынка. </p>				--}}
                {{--<p>Ну а в случае потери соединения с фермой мы известим вас в ту же минуту! Не теряйте время и деньги, присоиденяйтесь к нашей дружной комманде и поднимите себе прибыльность прямо сейчас!</p>     	--}}
			 {{--</div>--}}
            {{--<!-- /.box-body -->--}}
          {{--</div>--}}
          {{--<!-- /.box -->--}}
        {{--</div>  --}}
    {{----}}
    {{----}}
{{--<div class="col-md-4">--}}
          {{----}}
          {{----}}
          {{--<div class="box box-primary">--}}
            {{--<div class="box-header with-border">--}}
              {{--<h3 class="box-title">News</h3>--}}
              {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                {{--</button>--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
              {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.box-header -->--}}
            {{--<div class="box-body">--}}
              {{--<ul class="products-list product-list-in-box">--}}
                {{--<li class="item">--}}
{{--<!--                  <div class="product-img">--}}
                    {{--<img src="dist/img/default-50x50.gif" alt="Product Image">--}}
                  {{--</div>--}}
{{---->                  <div class="product-info">--}}
                    {{--<a href="javascript:void(0)" class="product-title">We have opened!--}}

                      {{--<span class="label label-warning pull-right"></span></a>--}}
                    {{--<span class="product-description">--}}
                          {{--We opened up to make mining easier--}}
                        {{--</span>--}}
                  {{--</div>--}}
                {{--</li>--}}
                {{--<!-- /.item -->--}}
{{--<!--                <li class="item">--}}
                  {{--<div class="product-img">--}}
                    {{--<img src="dist/img/default-50x50.gif" alt="Product Image">--}}
                  {{--</div>--}}
                  {{--<div class="product-info">--}}
                    {{--<a href="javascript:void(0)" class="product-title">Bicycle--}}
                      {{--<span class="label label-info pull-right">$700</span></a>--}}
                    {{--<span class="product-description">--}}
                          {{--26" Mongoose Dolomite Men's 7-speed, Navy Blue.--}}
                        {{--</span>--}}
                  {{--</div>--}}
                {{--</li>-->--}}
                {{--<!-- /.item -->--}}
{{--<!--                <li class="item">--}}
                  {{--<div class="product-img">--}}
                    {{--<img src="dist/img/default-50x50.gif" alt="Product Image">--}}
                  {{--</div>--}}
                  {{--<div class="product-info">--}}
                    {{--<a href="javascript:void(0)" class="product-title">Xbox One <span--}}
                        {{--class="label label-danger pull-right">$350</span></a>--}}
                    {{--<span class="product-description">--}}
                          {{--Xbox One Console Bundle with Halo Master Chief Collection.--}}
                        {{--</span>--}}
                  {{--</div>--}}
                {{--</li>-->--}}
                {{--<!-- /.item -->--}}

                {{--<!-- /.item -->--}}
              {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
{{--<!--            <div class="box-footer text-center">--}}
              {{--<a href="javascript:void(0)" class="uppercase">View All Products</a>--}}
            {{--</div>-->--}}
            {{--<!-- /.box-footer -->--}}
          {{--</div>--}}
        {{--</div>  --}}
    {{----}}
{{--</div>      --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="/vendor/jquery/jquery.min.js"></script>
<!-- FastClick -->
<script src="/vendor/fastclick/fastclick.js"></script>
<!-- Sparkline -->
<script src="/vendor/jquery/jquery.sparkline.min.js"></script>
<!-- SlimScroll -->
<script src="/vendor/jquery/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="/vendor/Chart/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/vendor/dist/js/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/vendor/dist/demo.js"></script>
@stop