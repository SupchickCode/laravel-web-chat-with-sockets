<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ChatController extends Controller
{
    public function index()
    {
        $varForRender = [
            'title' => 'Start Chat'
        ];

        return view("tmp.index", compact('varForRender'));
    }


    /**
     * This method gets `$token` and return view.
     * If `$token` alredy exists return redirect to '/' with flash message
     * 
     * @return view
     */
    public function getToken()
    {
        if ($this->alreadyExistToken()) {
            $token = CookieController::getCookie('token');
            session()->flash('message', "You already have token - $token");

            return redirect('/');
        } else {
            $token = $this->createToken(); 
            CookieController::setCookie("token", $token, 30);
        }

        #TODO INSERT INTO DB
        $varForRender = [
            'title' => "Your Token - $token",
            "token" => $token
        ];

        return view("tmp.getToken", compact('varForRender'));
    }


    public function findToken()
    {
        $varForRender = [
            'title' => "Find Friends",
        ];

        return view("tmp.findToken", compact('varForRender'));
    }


    /**
     * Check for already exist token in browser cookies store
     * 
     * @return string
     */
    private function alreadyExistToken(): string
    {
        if ($token = CookieController::getCookie('token')) {
            return $token;
        } else {
            return false;
        }
    }


     /**
     * Create a random Token
     * 
     * @return string
     */
    private function createToken(): string
    {
        return sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        );
    }
}
