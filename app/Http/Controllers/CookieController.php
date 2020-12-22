<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller
{

    static function setCookie($name, $value, $seconds = 3600)
    {
        setcookie($name, $value, time() + $seconds);
    }


    static function getCookie($name)
    {
        try {
            return $_COOKIE[$name];
        } catch (\Throwable $ex) {
            return false;
        }
    }
}
