<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{

    protected $redirectTo = '/owner';

    public function __construct()
    {
        $this->middleware('guest:owner',['except'=>['logout']]);
    }

    public function showLoginForm(){
        return view('auth.owner-login');
    }

    public function login(Request $request){
        //validate form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log owner in
        if (Auth::guard('owner')->attempt(['email' => $request->email,'password'=>$request->password]) ){
            //if successful then redirect to their intended location
            return redirect(route('owner.dashboard'));
        }
        //if unsuccessful return back to login form
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect(route('owner.login'));
    }
}
