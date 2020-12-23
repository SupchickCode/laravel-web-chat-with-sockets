<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function index()
    {
        $varForRender = [
            'title' => 'Start Chat'
        ];

        return view("tmp.index", compact('varForRender'));
    }
}
