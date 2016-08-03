<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1>New Users</h1>

        <ul>{{-- Use track-by="$index" if you are expecting duplicate values. --}}
            <li v-for="user in users" track-by="$index">@{{ user }}</li>
        </ul>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
        <script>
            var socket = io('http://laravel-redis-socket-io.dev:3000');
            new Vue({
                el: 'body',
                data: {
                    users: []
                },
                ready: function() {
                    socket.on('test-channel:App\\Events\\UserSignedUp', function(data) {
                        this.users.push(data.username);
                    }.bind(this));
                }
            });
        </script>
    </body>
</html>
