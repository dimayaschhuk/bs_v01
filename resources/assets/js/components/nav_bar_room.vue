<template>
    <div >




        <div class="row"   v-for="(row,index) in count_period">
            <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                <div>
                    <button v-on:click="showw(index)">round{{row.value}}</button>
                </div>

            </div>
            <!--<div class="col-lg-11 col-md-3 col-sm-3 col-xs-3" v-show="row.show" >-->
                <!--<div class="col-lg-12 col-md-3 col-sm-3 col-xs-3" >-->
                    <!--<div class="row"  >-->
                        <!--<div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" v-on:click="show=!show">-->
                            <!--ставки-->
                        <!--</div>-->
                        <!--<div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >-->
                            <!--результати-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        </div>







    </div>
</template>

<script>



    export default {
        props: ['count_period'],
        data() {
            return {

            }
        },


        methods: {
            showw:function (index) {
                this.$emit('showm',  index);
            }

        },
        created: function () {


        }

    }
</script>