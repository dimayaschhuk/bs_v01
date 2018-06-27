@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')
    
@stop



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Invite-only</div>
                <div class="panel-body">
                    <div class="alert alert-info">
                      There's ongoing closed testing.
                      For now, registration is invite-only.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="/vendor/jquery/jquery.min.js"></script>
@stop