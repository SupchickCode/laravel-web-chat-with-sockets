<?php

use App\Events\WebSocketChat;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ChatRoomController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ChatRoom;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageViewController::class, "index"]);

Route::get('/chatroom/{chatroom}',[ChatRoomController::class ,"chatroom"]);

Route::get('/chatroom/{chatroom}/messages', [ChatController::class, "fetchMessages"]);
Route::post('/chatroom/{chatroom}/messages', [ChatController::class, "sendMessage"]);

Route::post('/create_new_chatroom',[ChatRoomController::class, "create_chatroom"])->name("create_chatroom");

# CUSTOM AUTH ROUTES
Route::post('/getToken', [TokenController::class, "getToken"])->name("getToken");
Route::post('/register', [RegisterController::class,"register"])->name("register");
Route::get('/login', [LoginController::class, "show_login"])->name("login");
Route::post('/login', [LoginController::class, "postLogin"])->name("postLogin");
Route::post('/logout', [LoginController::class, "logout"])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/findToken', [TokenController::class, "findToken"])->name("findToken");



