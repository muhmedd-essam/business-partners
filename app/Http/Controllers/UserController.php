<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function login(LoginUsersRequest $request){
        $token=JWTAuth::attempt([
        'email' => $request->email,
         'password' =>  $request->password
        ]);
         if(!empty($token)){
            $user =User::where('email', $request->email)->first();
            return response()->json(['message' => 'done', 'data'=>[$token, $user]]);
        }
    }


}
