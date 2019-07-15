<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['pagenotfound','internalServerError']);
    }

    //======================= page not found ========================
    public function pagenotfound(){
        return view('errors.error_404');
    }

    //======================= internal server error ========================
    public function internalServerError(){
        return view('errors.error_500');
    }
}
