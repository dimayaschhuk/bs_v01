@extends('page')



@section('content_header')
   <h1>Кабинет</h1>
@stop

@section('content')




    <div id="app">
<block_games :round='{{json_encode($round)}}' :firm_name='{{json_encode($firm_name)}}'  :id_user='{{Auth::user()->id}}' :open_for_registrationn='{{json_encode($open_for_registration)}}' :to_gamess='{{json_encode($to_games)}}'  :after_gamess='{{json_encode($after_games)}}'   :current_gamess='{{json_encode($current_games)}}'></block_games>


    </div>

        {{--<script src="/js/vue-resource.min.js"></script>--}}


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


<script src="/js/app.js"></script>
@stop