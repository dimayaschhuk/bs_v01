<template>
    <div>


        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>



            <li v-bind:class="{'active':show[0].sow}" v-on:click="cabinet">
                <a >
                    <i class="fa fa-dashboard" ></i> <span>Cabinet</span>
                </a>
            </li >

            <li v-bind:class="{'active':show[1].sow}" v-on:click="games">
                <a >
                    <i class="fa fa-th"></i> <span>Games</span>
                </a>
            </li>

            <li v-bind:class="{'active':show[2].sow}" v-on:click="money">
                <a >
                    <i class="fa fa-money"></i> <span>Money</span>
                </a>
            </li>


            <li v-bind:class="{'active':show[3].sow}"  v-on:click="transaction">
                <a >
                    <i class="fa fa-cloud"></i> <span>Transactions</span>

                </a>
            </li>

            <li v-bind:class="{'active':show[4].sow} " v-on:click="statistic">
                <a >
                    <i class="fa fa-internet-explorer"></i> <span>Statistic</span>

                </a>
            </li>


            <br><br><br><br><br><br><br><br><br><br><br>

            <!--//------		  -->





        </ul>


    </div>
</template>

<script>


    export default {
        props: ['category'],
        data(){
            return {
show:[
    {name:'cabinet',sow:false},
    {name:'games',sow:false},
    {name:'money',sow:false},
    {name:'transactions',sow:false},
    {name:'statistic',sow:false}],
i:0,

            }

        },
        methods: {

            games:function () {

                window.location.href = '/user/games';
            },
            statistic:function () {
                window.location.href = '/user/statistic';
            },
            transaction:function () {
                window.location.href = '/user/transaction';
            },
            money:function () {
                window.location.href = '/user/money';
            },
            cabinet:function () {
                window.location.href = '/user/cabinet';
            },

        },
        created: function () {
            for (this.i = 0; this.show.length > this.i; this.i++) {
                if(this.show[this.i].name==this.category){
                    this.show[this.i].sow=true;
                }

            }
        }


    }




</script>

