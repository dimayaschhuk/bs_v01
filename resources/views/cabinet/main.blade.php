@extends('page')



@section('content_header')
   <h1>Кабинет</h1>
@stop

@section('content')




<div class="row" style="height: 100px" id="app">
    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-2" >
        <block_money :money='{{json_encode($money)}}'  ></block_money>
    </div>

    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-4" >
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">новости</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <h1>новости из базы данных</h1>

                <!-- ./box-body -->

            </div>

            <!-- /.content -->
        </div>
    </div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script src="/js/app.js"></script>
@stop