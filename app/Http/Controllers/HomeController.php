<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChatRoom;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $chatrooms = ChatRoom::where('user_id',auth()->user()->id)->get();

        $var_for_render = [
            'title' => 'Home Page',
            'chatrooms' => $chatrooms
        ];

        return view('home',compact('var_for_render'));
    }
}
