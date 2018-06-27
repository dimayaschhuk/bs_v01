@extends('page')





@section('content_header')
    <h2>Финанси</h2>
@stop



@section('content')


    <div class="row" style="height: 100px" id="app">
        <div class="row" >
            <div class="col-lg-10 col-md-3 col-sm-3 col-xs-4 offset-lg-1" >
                <block_money :money='{{json_encode($money)}}' ></block_money>
            </div>

        </div>

        <div class="row" >

<transaction :transaction='{{json_encode($transaction)}}'></transaction>
        </div>








    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <script src="/js/app.js"></script>
@stop