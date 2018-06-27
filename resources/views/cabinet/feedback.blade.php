@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')
    
@stop



@section('content')

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
          
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Feedback list</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body" style="overflow-x: scroll;">
                <table id="example1" class="table table-bordered table-striped" style="max-width: 100%;">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <tr v-for="answer in answerData">
                            <td>
                                @{{ answer.title }}
                            </td>
                            <td>
                                <span v-html="answer.description"></span>
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
            <div class="panel-heading">Send feedback</div>
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
                <div class="form-group">
                    <div style="overflow: hidden;">
                        <label>Type:</label>
                        <br />
                        <select v-model="titleSel" @change="titleAnother()" style="float: left;">
                            <option value="Баг">Баг</option>
                            <option value="Жалоба">Жалоба</option>
                            <option value="Предложение">Предложение</option>
                            <option value="another">Другое(ввод)</option>
                        </select>
                        
                        <input type="text" placeholder="Введите вашу тему" v-model="title" name="title" class="form-control" v-if="another" style="width: 50%; float: left; margin-left: 10px;">
                        <br />
                    </div>

                    <div>
                        <label>Text:</label>
                        <vue-editor v-model="description"></vue-editor>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary form-control" v-on:click="sendFeedback()">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->



@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">

@stop

@section('js')
<script src="/js/vue.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script src="/js/axios.min.js"></script>
<script src="/js/vue2-editor.js"></script>
<script src="/js/noty.js"></script>
<script>
    
new Vue({
    el: "#app",
    data: {
        answerData: [],
        formInvite: false,
        title: '',
        titleSel: 'Баг',
        description: '',
        another: false,
    },
    mounted: function () {
        this.onConfirm();
    },
    methods: {
        onConfirm: function() {
            var self = this;
            axios({
                method: 'post',
                url: '/feedback/email',
                data: {}
            })
            .then(function(response) {
                self.answerData = response.data;
            })
            .catch(function(error) {
                console.log(error);
            }); 
        },
        sendFeedback: function() {
            if(this.titleSel == 'another') {
                title = this.title;
            } else {
                title = this.titleSel;
            }

            var self = this;
            axios({
                method: 'post',
                url: '/feedback/store',
                data: {
                    title: title,
                    description: this.description
                }
            })
            .then(function(response) {
                new Noty({
                    type: response.data.type,
                    layout: 'topRight',
                    text: response.data.message,
                    timeout: 2000,
                }).show();
                self.onConfirm();
            })
            .catch(function(error) {
                console.log(error);
            }); 
        },
        titleAnother: function() {
            if(this.titleSel == 'another') {
                this.another = true;
            } else {
                this.another = false;
            }
        },
    }
});

</script>
@stop