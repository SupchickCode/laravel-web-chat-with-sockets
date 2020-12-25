<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;

use Illuminate\Http\Request;

use App\Models\ChatRoom;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;

class ChatRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function chatroom()
    {
        $varForRender = [
            'title' => "Chatroom"
        ];

        return view("tmp.chat", compact('varForRender'));
    }


    public function create_chatroom(Request $request)
    {   
        $this->validate($request, [
            'chatroom' => 'bail|required|unique:chat_rooms|max:255',
            'password' => 'required|min:4',
        ]);
        
        auth()->user()->chatrooms()->create([
            'chatroom' => $request['chatroom'],
            'password' => Hash::make($request['password']),
            'user_id' => auth()->user()->id
        ]);

        return ['status' => 'success'];
    }
}
