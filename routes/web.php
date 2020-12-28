<?php

use App\Events\WebSocketChat;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

#TODO
/**
 * Написать документацию ~70%
 * Написать поиск по имени и имени чат канала ~70%
 * Удалять канал и все сообщения DONE
 * Проверка пароля при входе в чат (через модальное окно)
 * Скрины и формить для портфолио
 * DOCKER ?
 */
Route::get('/', [PageViewController::class, "index"]);

Route::get('/chatroom/{chatroom}',[ChatRoomController::class ,"chatroom"]);
Route::post('/create_new_chatroom',[ChatRoomController::class, "create_chatroom"])->name("create_chatroom");
Route::get('/chatroom/remove/{chatroom_id}',[ChatRoomController::class, "remove_chatroom"])->name("remove_chatroom");

# METHODS FOR CLIENT SIDE, I USE IT IN VUE COMPONET TO GET AND SEND MESSAGES
Route::get('/chatroom/{chatroom}/messages', [ChatController::class, "fetchMessages"]);
Route::post('/chatroom/{chatroom}/messages', [ChatController::class, "sendMessage"]);

# CUSTOM AUTH ROUTES
Route::post('/getToken', [TokenController::class, "getToken"])->name("getToken");
Route::post('/register', [RegisterController::class,"register"])->name("register");
Route::get('/login', [LoginController::class, "show_login"])->name("login");
Route::post('/login', [LoginController::class, "postLogin"])->name("postLogin");
Route::post('/logout', [LoginController::class, "logout"])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, "show_search_form"])->name("search");
Route::post('/search', [SearchController::class, "search_by_chatroom_and_name"])->name("search_value");



