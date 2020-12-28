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

    /**
     * Methods searchs in the db and retrun view with link for chatroom if it exists 
     * or redirect back with flash message
     * 
     * @return view 
     * @return redirect
     */
    public function search_by_chatroom_and_name()
    {
        $search_value = request('input');
        $chatroom = ChatRoom::where('chatroom', $search_value)->get();

        if (!empty($chatroom[0])) {
            $varForRender = [
                'title' => "Chatroom",
                'chatroom' => $chatroom[0]
            ];

            return view('tmp.search_output', compact('varForRender'));
        }

        return redirect()->back()->with('message', "We didn't find chatroom with this name `$search_value`");
    }
}
