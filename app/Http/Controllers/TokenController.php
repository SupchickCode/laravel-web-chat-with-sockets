<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{   
    /**
     * This method gets `$token` and return view.
     * 
     * @return view
     */
    public function getToken()
    {
        $token = $this->createToken();
        
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
