const express = require('express');
const app = express();
const server = require('http').createServer(app);
const users = [];

const io = require('socket.io')(server,{
    cors: { origin: "*" }
});

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
        // console.log(`User Connected: ${user.id}`);
    });

    socket.on('disconnect', function () {
        const disconnectedUserId = getKeyByValue(users, socket.id); // Get the user ID by socket ID
        if (disconnectedUserId) {
            users.splice(disconnectedUserId, 1); // Remove the user from the array
            let status = {'leave': disconnectedUserId }
            io.emit('updateUserStatus', users , status);
            // console.log(`User Disconnected: ${disconnectedUserId}`);
        }
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

server.listen(3000, () => {
    console.log("server is listening on port 3000");
});