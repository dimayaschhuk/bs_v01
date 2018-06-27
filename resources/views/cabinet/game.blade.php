@extends('page')





@section('content_header')
   <h2>Game</h2>
@stop



@section('content')


    <div id="app">
        <room_game :periodd='{{json_encode($period)}}' :count_periodd='{{json_encode($count_period)}}' :sum_period='{{json_encode($sum_period)}}'
                   :after_period='{{json_encode($after_period)}}'
        :id_game='{{json_encode($id)}}' :name_firm='{{json_encode($name_firm)}}' :mail='{{json_encode(Auth::user()->email)}}'
                   :test='{{json_encode($test)}}' :player_id='{{json_encode($player_id)}}'
                     ></room_game>


    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/js/app.js"></script>
@stop