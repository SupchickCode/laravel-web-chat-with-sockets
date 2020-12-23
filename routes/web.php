<?php

use App\Events\WebSocketChat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ChatController;

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

Route::get('/chat', function () {
    broadcast(new WebSocketChat('message'));
    
    return view('welcome');
});

Route::get('/chats', [ChatController::class, "chats"]);
Route::get('/messages', [ChatController::class, "fetchMessages"]);
Route::post('/messages', [ChatController::class, "sendMessage"]);


Route::get('/', [ChatController::class, "index"]);
Route::post('/getToken', [ChatController::class, "getToken"])->name("getToken");
Route::get('/findToken', [ChatController::class, "findToken"])->name("findToken");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
