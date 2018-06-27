<template>
<div>
<input type="text" v-model="text">
    <button v-on:click="test(text)">+++</button>

</div>




</template>

<script>
//    var socket=io(':6001');
//
//    socket.on('mes',function (data) {
//        console.log(data);
//    });


    export default {
        data() {
            return {
text:'',
            }
        },

        sockets: {
            connect() {
                console.log('aaaaaaaaaaa');
            },

            disconnect() {
                console.log('bbbbbbbbb');
            },

            mes(data) {
                alert(data);
                console.log(data);
            },
            messages(data) {
             alert(data);
            }
        },
        methods: {
            test:function (text) {
                this.$socket.emit('messages',text);
}
        },

    }
</script>