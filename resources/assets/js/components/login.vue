<template>
    <div>

        <!--<div class="row">-->
            <!--<div class="col-xs-6 ">-->
            <!--</div>-->
        <!--</div>-->




        <div class="login-box">

            <!-- /.login-logo -->
            <div class="login-box-body">

<p v-show="showw">login або пароль не вірні</p>
                <form >
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Email/login" v-model="name">

                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" v-model="password">

                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 offset-1">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" v-model="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat" v-on:click="login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="#">I forgot my password</a><br>
                <a class="text-center" v-on:click="register">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>



    </div>
</template>

<script>


    export default {
        props: [],
        data(){
            return {
              name:'',
                password:'',
                checkbox:false,
                showw:false,

            }

        },
        methods: {
            register:function () {
                window.location.href = '/register';
            },
            login:function() {
                if(this.checkbox){
                    this.$cookie.set('login', JSON.stringify(this.name), 1);

                }

                axios.post(`/login`, {
                    name: this.name,
                    password: this.password,
                }).then(response => {

                    if(response.data == 'sss'){
                    window.location.href = '/user/cabinet';
                }else{
                    this.showw = true;
                }

            });


            }

        },
        created: function () {
            if(JSON.parse(this.$cookie.get('login'))!= null){
                this.name = JSON.parse(this.$cookie.get('login'));

            }

        }


    }




</script>

