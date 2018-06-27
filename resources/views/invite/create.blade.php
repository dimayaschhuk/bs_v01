@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')
    
@stop



@section('content')



<div class="row" id="rowStat">
    <div class="col-md-6 col-sm-12 col-xs-12">
          
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Referal list</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body" style="overflow-x: scroll;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>E-mail</th>
                            <th>Register</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr v-for="answer in answerData">
                        <td>
                            @{{ answer.code }}
                        </td>
                        <td>
                            @{{ answer.email }}
                        </td>
                        <td v-bind:style="{ color:answer.color }">
                            @{{ answer.title }}
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Invite new user</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', NULL, ['class' => 'form-control']) !!}
                    {!! Form::label('message', 'Message:') !!}
                    {!! Form::textarea('message', NULL, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
                <!-- Target -->
                <input style="width: calc(100% - 50px);" id="foo" value="http://cabinet.ampool.tech/register?referal={{ Auth::user()->code }}">

                <!-- Trigger -->
                <button style="margin-top: -4px;" v-on:click="copy()" class="btn" data-clipboard-target="#foo">
                    <i class="fa fa-floppy-o"></i> 
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


<script src="/js/vue.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script src="/js/axios.min.js"></script>
<script src="/js/noty.js"></script>
<script src="/js/clipboard.js"></script>
<script>

new Vue({
    el: "#rowStat",
    data: {
        answerData: [],
        formInvite: false,
    },
    mounted: function () {
        this.onConfirm();
    },
    methods: {
        onConfirm: function() {
            var self = this;
            axios({
                method: 'post',
                url: '/menu/referals',
                data: {}
            })
            .then(function(response) {
                self.answerData = response.data;
            })
            .catch(function(error) {
                console.log(error);
            }); 
        },
        copy: function() {
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: 'Реферальная ссылка скопирована в буфер обмена',
                timeout: 2000,
            }).show();
        }

    }
});

new ClipboardJS('.btn');

</script>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">
@stop

@section('js')

<script src="/vendor/jquery/jquery.min.js"></script>
@stop