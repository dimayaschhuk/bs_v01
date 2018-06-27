@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')
        <h1>Создать игру</h1>

@stop



@section('content')

    <div id="app">
        <block_create_game :id_user='{{Auth::user()->id}}'  ></block_create_game>


    </div>




@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">

@stop

@section('js')
    <script src="/js/app.js"></script>
@stop