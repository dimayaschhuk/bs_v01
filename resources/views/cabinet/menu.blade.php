@extends('page')

@section('title', 'q.tech')

@section('content_header')
    <section class="content-header">
       <h1>content_header</h1>
    </section>
@stop

@section('content')

  <h2>content</h2>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">
@stop

@section('js')

<script src="/vendor/jquery/jquery.min.js"></script>
<!-- FastClick -->
<script src="/vendor/fastclick/fastclick.js"></script>
<!-- Sparkline -->
<script src="/vendor/jquery/jquery.sparkline.min.js"></script>

@stop