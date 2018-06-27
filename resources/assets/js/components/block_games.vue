<template>
    <div>

        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 " >

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 " >
<button v-on:click="myy(true)">мои</button>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 " >
                <button  v-on:click="myy(false)">сеть</button>
            </div>
        </div>
        <div v-if="my">
    <div class="row" style="height: 100px">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
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
                        <div class="col-xs-3" >
                            <p>name</p>
                        </div>
                        <div class="col-xs-6" >
                            <p>время начала</p>
                        </div>
                        <div class="col-xs-3" >
                            <p>имя фирмы</p>
                        </div>



                    </div>
                    <div class="row" v-for="game in to_games">
                        <div class="col-xs-3" >
                            <p>{{game.name}}</p>
                        </div>
                        <div class="col-xs-6" >
                            <p>{{game.time_start}}</p>
                        </div>
                        <div class="col-xs-3" >
                            <p>{{firm_name[game.id]}}</p>
                        </div>





                    </div>

                    <!-- ./box-body -->

                </div>

                <!-- /.content -->
            </div>
        </div>

        <div class="col-lg-6 col-md-3 col-sm-3 col-xs-4" >
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Завершение игры</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" >
                        <div class="col-xs-4" >
                            <p>name</p>
                        </div>
                        <div class="col-xs-4" >
                            <p>name firm</p>
                        </div>



                    </div>
                    <div class="row" v-for="game in after_games">

                        <div class="col-xs-4" >
                            <p>{{game.name}}</p>
                        </div>
                        <div class="col-xs-4" >
                            <p>{{firm_name[game.id]}}</p>
                        </div>
                        <div class="col-xs-4" >
                            <button  v-on:click="run_game(game.id)">посмотреть результат</button>
                        </div>

                    </div>

                    <!-- ./box-body -->

                </div>

                <!-- /.content -->
            </div>
        </div>

    </div>
        <br> <br>
        <div class="row" style="height: 100px">
            <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">текущие игры</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" >
                        <div class="col-xs-2" >
                            <p>Назва игры</p>
                        </div>
                        <div class="col-xs-2" >
                            <p>Назва фирмы</p>
                        </div>
                        <div class="col-xs-2" >
                            <p>Раунд</p>
                        </div>



                    </div>
                    <div class="row" v-for="game in current_games">




                        <div class="col-xs-2" >
                            <p>{{game.name}}</p>
                        </div>
                        <div class="col-xs-2" >
                            <p>{{firm_name[game.id]}}</p>
                        </div>
                        <div class="col-xs-2" >
                            <p>{{round[game.id]}}/{{game.sum_period}}</p>
                        </div>
                        <div class="col-xs-6" >
                            <button v-on:click="run_game(game.id)">в гру</button>
                        </div>
                    </div>

                    <!-- ./box-body -->

                </div>

                <!-- /.content -->
            </div>
            </div>
        </div>
        </div><div v-else="">
    <div class="row" style="height: 400px">
        <div class="col-lg-12 col-md-10 col-sm-10 col-xs-10" >
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Открыто для регистрации</h3>

                    <div class="box-tools pull-right">
                        <button v-on:click="create_game">Создать игру</button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row" >
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>name</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3" >
                            <p>время начала</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>количество</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>длина периода</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>цена входа</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>тип</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>создатель игры</p>
                        </div>


                    </div>
                    <div class="row" v-for="game in open_for_registration">
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >

                            <p>{{game.name}}</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3" >
                            <p id="timer_inp">{{q}}
                                <!--{{game.time_start}}-->
                            </p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>{{game.sum_period}} </p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>{{game.period_hours}} </p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>{{game.price_game}}</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p>{{game.type}}</p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <p></p>
                        </div>

                        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
                            <button  @click="showModall(game.id,game.price_game,game.name)">присойдениться</button>

                        </div>

                    </div>

                    <!-- ./box-body -->

                </div>

                <!-- /.content -->
            </div>
        </div>

    </div>
    </div>
        <!-- template for the modal component -->
        <script type="text/x-template" id="modal-template">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-container">

                            <slot name="header">

                            </slot>

                            <div class="modal-body">

                                <slot name="body">

                                </slot>

                            </div>

                            <div class="modal-footer">
                                <slot name="footer">

                                </slot>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </script>

        <!-- app -->


            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">

                <div slot="header">
                    <h3 class="row"> Присойденится к игре:<span style="color:#c5717c;">{{name}}</span> </h3>

                </div>
                <div slot="body">

                    <div class="row"> цена:{{price}}</div>
                    <div class="row">  <input v-on:change="checkboxx"  type="checkbox" v-model="checkbox"> согласен</div>
                    <p v-show="error">Вы забили поставить галочку</p>
                    <input type="text" v-on:change="firm_namee"  class="form-control"
                           placeholder="Enter firm name" v-model="firmName">
                    <p v-show="error_firm_name">Вы забили ввести имя фирмы</p>
                </div>
                <div slot="footer">
                    <button v-on:click="ok">ok</button>
                    <button v-on:click="cancel">отмена</button>
                </div>
            </modal>

    </div>
</template>

<script>


    Vue.component('modal', {
        template: '#modal-template'
    });
    export default {

        props: ['open_for_registrationn','to_gamess','after_gamess','current_gamess','id_user','firm_name','round'],
        data() {
            return {
                my:false,
                q:15,
                error_firm_name:false,
                error_name:false,
                error:false,
                firmName:'',
                checkbox:false,
                showModal: false,
                game_id:'',
                price:0,
                name:'',
                open_for_registration:[],
                to_games:[],
                after_games:[],
                current_games:[]
            }
        },
        methods: {
            test:function () {
                axios.post(`/user/test`, {
                   test:22222

                });
            },
            myy:function (value) {
                this.my=value;
            },
            run_game:function (id) {
                window.location.href = '/user/game/'+id;
            },
            create_game:function () {
                window.location.href = '/user/create_game/'+this.id_user;
            },
            showModall:function (id,price,name) {
                this.game_id=id;
                this.price=price;
                this.name=name;
                this.showModal=true;

            },

            ok:function () {


                if(!this.error_name){
              this.error_firm_name=true;
            }else {this.error_firm_name=false;}

                if(this.checkbox){
                    this.error=false;
                }else {this.error=true;}

                if(this.checkbox&&this.error_name) {

                        axios.post(`/user/register_games`, {
                            data: {user_id: this.id_user, game_id: this.game_id, firm_name:this.firmName, status: 'sds'},price:this.price

                        }).then(response => {
                            if(response.data == 'not'){
                        alert(response.data);
                             }
                        this.to_games.push(response.data);

//
                });
                    this.showModal = false;
                }



                        this.error_name=false;

                        this.checkbox = false;
                        this.firmName = '';




            },
            firm_namee:function () {

                if(this.firmName != ''){
                    this.error_firm_name=false;
                 this.error_name=true
                }else {this.error_name=false}
            },
            checkboxx:function () {

                if(this.checkbox){
                    this.error=false
                }else { this.error=true}
            },

            cancel:function () {
                this.showModal=false;
            }
        },
        created: function () {
            this.open_for_registration = this.open_for_registrationn;
            this.to_games = this.to_gamess;
            this.after_games = this.after_gamess;
            this.current_games = this.current_gamess;

        }

    }
</script>
<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }
</style>