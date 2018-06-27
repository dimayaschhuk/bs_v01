<template>
    <div>

    </div>
</template>

<script>



    export default {
        props: ['test'],
        data() {
            return {

            }
        },


        methods: {
            login:function () {
                window.location.href = '/login';
            },
            register:function () {
                window.location.href = '/register';
            }
        },

    }
</script>