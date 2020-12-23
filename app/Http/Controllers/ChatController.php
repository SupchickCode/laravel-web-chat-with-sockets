<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;


class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }


    public function chats()
    {
        $varForRender = [
            'title' => 'Start Chat'
        ];

        return view("tmp.chat", compact('varForRender'));
    }


    public function fetchMessages()
    {
        return Message::with('user')->get();
    }


    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
