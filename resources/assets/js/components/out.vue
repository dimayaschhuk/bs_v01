
<template>

       <a href="#" v-on:click="out">out</a>







</template>

<script>


    export default {
        props: [],
        data(){
            return {



            }

        },
        methods: {

            out:function () {
                window.location.href = '/out';
            },

        },
        created: function () {

        }


    }




</script>

