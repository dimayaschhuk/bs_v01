<template>

        <div class="login-box-body">


            <form >
                <div class="form-group has-feedback">
                    <label>Назва игры</label>
                    <input type="text" class="form-control" placeholder="Enter name" v-model="name">


                </div>
                <div class="form-group has-feedback">
                    <label>Стоимость входа</label>
                    <input type="number" class="form-control" placeholder="Enter name" v-model="price">

                </div>
                <div class="form-group has-feedback">
                    <div class="row" >
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3" >
                            <label>Время начала</label>
                            <input type="time" class="form-control" placeholder="Enter name" v-model="time">
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-3 col-xs-3" >
                            <label for="date">Дата начала: </label>
                            <input v-model="data" type="date" class="form-control" id="date" name="date"/>
                        </div>

                </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Количество периодов</label>
                    <input type="number" class="form-control" placeholder="Enter name" v-model="count_period">

                </div>
                <div class="form-group has-feedback">
                    <label>Длительность периода</label>
                    <input type="number" class="form-control" placeholder="Enter name" v-model="time_period">

                </div>
                <div class="form-group has-feedback">
                    <label>Названия вашей фирмы</label>
                    <input type="text" class="form-control" placeholder="Enter firm name" v-model="firm_name">

                </div>
                <div class="form-group has-feedback">
                    <label v-model="type_game">Тип игры</label>
                    <select>
                        <option>Тип игры</option>

                    </select>

                </div>
            </form>
            <div class="row">
                <div class="col-xs-7 offset-1">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"  v-model="checkboxx"> Внести вступительный взнос
                        </label>
                        <p v-show="error">поставте галочку</p>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat" v-on:click="create">Создать</button>
                </div>
                <!-- /.col -->
            </div>










        </div>


</template>

<script>

    export default {
        props: ['id_user'],

        data() {
            return {
                error:false,
                checkboxx:false,
                price:100,
                name:'',
                time:0,
                data:0,
                firm_name:'',

                count_period:0,
                time_period:0,
                type_game:'',


            }
        },

        methods: {

            create:function () {

if(this.checkboxx){
//,
                axios.post(`/user/create_game`, {
                    data: {
                        name: this.name,
                        type: this.type_game,
                        time_start: this.data+' '+this.time,
                        period_hours: this.time_period,
                        price_game: this.price,
                        creator_id: this.id_user,
                        sum_period: this.count_period,
                        game_win: null,
                        game_status: 'wait_reg'},
                    firm_name:this.firm_name
                }).then(response => {
                    if(response.data=='ГРУ СТВОРЕНО УСПІШНО'){

                    window.location.href = '/user/cabinet';
                }else {
                        alert(response.data);
    }
            });

            }else {
                this.error=true
            }
            }

        },

    }
</script>
