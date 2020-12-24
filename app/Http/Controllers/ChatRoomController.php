<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;

use Illuminate\Http\Request;

use App\Models\ChatRoom;
use App\Models\Message;

class ChatRoomController extends Controller
{   
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function chatroom()
    {   
        #$chatroom = ChatRoom::where('chatroom','=',request('chatroom'))->firstOrFail();

        #$name = $chatroom['chatroom'];
        $varForRender = [
            'title' => "Chatroom"
        ];

        return view("tmp.chat", compact('varForRender'));
    }
}
