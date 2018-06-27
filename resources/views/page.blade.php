@extends('master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        @include('partials.header.header')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 909px; height: auto; overflow: hidden;">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

        @include('partials.header.control-sitebar')

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
@include('footer')
