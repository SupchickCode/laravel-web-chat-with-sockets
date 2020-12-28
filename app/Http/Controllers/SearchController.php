<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ChatRoom;

class SearchController extends Controller
{
    public function show_search_form()
    {
        $varForRender = [
            'title' => "Find Friends",
        ];

        return view("tmp.findToken", compact('varForRender'));
    }


    public function search_by_chatroom_and_name()
    {           
        $search_value = request('input');

        $user = User::where('name', $search_value)->get();
        $chatroom = ChatRoom::where('chatroom', $search_value)->get();

        $varForRender = [
            'title' => "Chatroom",
            'user' => $user,
            'chatroom' => $chatroom
        ];

        return view('tmp.search_output',compact('varForRender'));
    }
}
