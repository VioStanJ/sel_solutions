<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if(!Auth::attempt($request->all())){
            return response()->json(['success'=>false,'message'=>'Invalid Credentials'], 200);
        }

        $user = Auth::user();
        $token = $user->createToken('api')->accessToken;

        return response()->json(['success'=>true,'user'=>$user,'token'=>$token], 200);
    }
}
