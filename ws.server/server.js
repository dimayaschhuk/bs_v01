var io = require('socket.io')(6001);
io.on('connection',function (socket) {
   console.log('New',socket.id);


  // socket.emit('messages',1111)

    // socket.broadcast.emit('messages',socket.id);
    //
    // socket.on('messages',function (data) {
    //     socket.emit('messages',data);
    //     // socket.broadcast.emit('messages',data);
    //
    // })

    // socket.join('vip',function (error) {
    //     console.log(socket.rooms);
    // })

socket.on('messages',function (data) {
    console.log(data);
    socket.broadcast.send(data);
    socket.emit('mes',data)
})

});