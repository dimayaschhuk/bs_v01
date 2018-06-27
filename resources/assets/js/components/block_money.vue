<template>
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
        <div class="row">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Баланс</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-4" >
                {{money}} грн
            </div>
            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-4" >
                <button v-on:click="run">пополнить счет</button>
            </div>

        </div>

        <!-- /.content -->
    </div>
        </div>
    </div>
</template>

<script>


    export default {
        props: ['money'],
        data(){
            return {


            }

        },
        methods: {
run:function () {
    window.location.href = '/user/money_transfer';
}


        },
        created: function () {

        }


    }




</script>

