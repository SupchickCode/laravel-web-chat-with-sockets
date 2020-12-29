# laravel-web-chat-with-sockets
Here is my pet-project there is web chat.

In this app you can create a private chatroom for each user
and start chat with each other.


# Install
- git clone 
- composer install
- change database rules in .Env
- php artisan migrate 
- don't forget to run websocket server with command `php artisan websocket:serve`
- php artisan serve

This app use:
- laravel
- mysql
- websockets;
- pusher-js;
- vue.js

