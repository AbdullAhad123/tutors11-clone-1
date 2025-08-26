const express = require('express');
const app = express();
const cors = require('cors'); // Import the cors module
// const server = require('http').createServer(app);
const users = [];

app.use(express.urlencoded({extended: true}));
app.use(cors({ origin: "*" }));
app.set('trust proxy', 1);

var server = app.listen(3000, function () {
    var host = server.address().address;
    var port = server.address().port;
    console.log(`Example app listening at http://${host}:${port}`, host, port)
  });
// const io = require('socket.io')(server);
const io = require('socket.io')(server, {
    cors: { origin: "*" },
});
// const io = require('socket.io')(server,{
//     cors: { origin: "*" }
// });

io.on('connection', function (socket) {
    socket.on('user_connected', function (user) {
        users[user.id] = {
            socket_id: socket.id,
            user_id: user.id,
            first_name: user.first_name,
            last_name: user.last_name,
            profile_photo_path: user.profile_photo_path,
        };
        let status = {'join': user.id }
        io.emit('updateUserStatus', users , status);
        io.emit('onlineUser', user.id, 'online');
        // console.log(`User Connected: ${user.id}`);
    });
    socket.on('disconnect', function () {
        const disconnectedUserId = getKeyByValue(users, socket.id); // Get the user ID by socket ID
        if (disconnectedUserId) {
            users.splice(disconnectedUserId, 1); // Remove the user from the array
            let status = {'leave': disconnectedUserId }
            io.emit('updateUserStatus', users , status);
            io.emit('onlineUser', disconnectedUserId, 'offline');
            // console.log(`User Disconnected: ${disconnectedUserId}`);
        }
    });
    socket.on('join_chat', function (user_id, viewType) {
        let room_id = "1"+user_id;
        if(room_id != 11){
            // console.log("join room: " + room_id);
            socket.join(room_id);
            io.emit('receiveMessage', room_id, viewType, user_id, '', null);
            console.log("join_chat", room_id, viewType, user_id);
        }
    });
    socket.on('send_chat', function (user_id, viewType, msg, user) {
        // console.log("send to " + user_id);
        io.emit('receiveMessage', '1'+user_id, viewType, user_id, msg, user);
        console.log("send_chat", '1'+user_id, viewType, user_id);
    });
});

function getKeyByValue(map, value) {
    for (let [key, val] of map.entries()) {
        if (val !== undefined && val.socket_id === value) {
            return key;
        }
    }
    return null;
}

// server.listen(3000, () => {
//     console.log("server is listening on port 3000");
// });