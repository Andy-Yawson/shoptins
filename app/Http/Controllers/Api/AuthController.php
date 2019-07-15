<?php

namespace App\Http\Controllers\Api;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email',$request->email)->first();

        if (!$user){
            return response([
                'status' => 204,
                'error' => true,
                'message' => "User not registered"
            ]);
        }

        if (Hash::check($request->password,$user->password)){

            $http = new Client();
            $response = $http->post(url('oauth/token'),[
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => "Lq2kcNNlMNBcNGznaU9sAQjCTXACOF9AJS7S2LjS",
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => ''
                ]
            ]);
            return response([
                'data' => json_decode((string) $response->getBody(), true),
                'status' => 200,
                'error' => false,
                'message' => "login successful"
            ]);

        }else{
            return response([
                'status' => 204,
                'error' => true,
                'message' => "Invalid password"
            ]);
        }

    }

    public function register(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        //check to see if user is registered in database before inserting values...
        $user = User::where('email',$request->email)->first();
        if ($user){
            return response([
                'status' => 206,
                'error' => false,
                'message' => "User already registered"
            ]);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $http = new Client();
            $response = $http->post(url('oauth/token'),[
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => "Lq2kcNNlMNBcNGznaU9sAQjCTXACOF9AJS7S2LjS",
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => ''
                ]
            ]);

            return response([
                'data' => json_decode((string) $response->getBody(), true),
                'status' => 200,
                'error' => false,
                'message' => "registration successfully"
            ]);
        }

    }
}
