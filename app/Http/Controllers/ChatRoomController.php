<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $chatroom = ChatRoom::where('chatroom', '=', request('chatroom'))->firstOrFail();
        $varForRender = [
            'title' => "Chatroom"
        ];

        return view("tmp.chat", compact('varForRender'));
    }

    /**
     * Validate data and create a new chatroom 
     * 
     * @return redirect 
     */
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

        return redirect()->back();
    }

    /**
     * Remove chatroom and message belongs to this room
     * 
     * @return redirect 
     */
    public function remove_chatroom(Request $request)
    {
        $id = $request['chatroom_id'];

        DB::delete("DELETE FROM `chat_rooms` WHERE `id` = $id");
        DB::delete("DELETE FROM `messages` WHERE `chatroom_id` = $id");

        return redirect()->back();
    }
}
