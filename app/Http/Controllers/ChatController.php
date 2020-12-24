<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

use App\Models\ChatRoom;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    
    public function fetchMessages()
    {   
        $chatroom = ChatRoom::where('chatroom','=',request('chatroom'))->firstOrFail();
        $chatroom_id = $chatroom['id'];
    
        return Message::with('user')->where('chatroom_id', $chatroom_id)->get();
    }


    public function sendMessage(Request $request)
    {   
        $chatroom = ChatRoom::where('chatroom','=',request('chatroom'))->firstOrFail();
        $chatroom_id = $chatroom['id'];
        
        $message = auth()->user()->messages()->create([
            'message' => $request->message,
            'chatroom_id' => $chatroom_id
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
