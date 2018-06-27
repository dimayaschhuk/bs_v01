<template>
    <div>




                <div class="col-lg-10 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1" >
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Скоро начнуться</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row" >
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    amount
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    addition_info
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    created_data
                                </div>

                            </div>
                            <div class="row" v-for="row in transaction">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    {{row.amount}}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    {{row.addition_info}}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" >
                                    {{row.created_at}}
                                </div>

                            </div>

                            <!-- ./box-body -->

                        </div>

                        <!-- /.content -->
                    </div>
                </div>








    </div>
</template>

<script>



    export default {

        props: ['transaction'],
        data() {
            return {

            }
        },
        methods: {


        },
        created: function () {


        }

    }
</script>
