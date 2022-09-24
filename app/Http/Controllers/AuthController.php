<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\OtpReceiver;
use Carbon\Carbon;
use App\Utils;
use App\Events\SMSEvent;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'phone'=>'',
            'email'=>'',
            'password'=>'required|min:8'
        ]);

        if(!Auth::attempt($request->all())){
            return response()->json(['success'=>false,'message'=>'Invalid Credentials'], 200);
        }

        $user = Auth::user();
        $token = $user->createToken('api')->accessToken;

        return response()->json(['success'=>true,'user'=>$user,'token'=>$token], 200);
    }

    public function loginPhone(Request $request)
    {
        $request->validate([
            'phone'=>'required|exists:users,phone'
        ]);

        $user = User::where('phone','=',$request->phone)->get()->first();

        if($user->blocked){
            return response()->json(['success'=>false,'message'=>'Account Hold !'], 200);
        }

        if(!$user->status){
            return response()->json(['success'=>false,null], 200);
        }

        $otp = Utils::generateOTP(4);
        $expiration = Carbon::now()->add(10,'minutes');

        OtpReceiver::create([
            'phone'=>$user->phone,
            'otp'=>$otp,
            'expired_at'=>$expiration,
        ]);

        $msj = "kòd OTP ou a se ".$otp.". De SEL Solutions";

        event(new SMSEvent($user->phone,$msj));

        return response()->json(['success'=>true,'otp'=>$otp,'expired_at'=>$expiration], 200);
    }

    public function verifyLogin(Request $request)
    {
        $request->validate([
            'phone'=>'required|exists:users,phone',
            'otp'=>'required'
        ]);

        $rec = OtpReceiver::where('phone','=',$request->phone)->get()->last();

        if(empty($rec)){
            return response()->json(['success'=>false,'message'=>'OTP kod la ekspire ou pa bon !'], 200);
        }

        $d1 = Carbon::parse($rec->expired_at);
        $d2 = Carbon::now();

        if(!$d1->gt($d2)){
            return response()->json(['success'=>false,'message'=>'OTP kod la ekspire ou pa bon !'], 200);
        }

        if($rec->otp != $request->otp){
            return response()->json(['success'=>false,'message'=>'OTP kod la ekspire ou pa bon !'], 200);
        }

        $user = User::where('phone','=',$request->phone)->where('status','=',1)->get()->first();

        if(empty($user)){
            return response()->json(['success'=>false,'message'=>'Kont ou an bloke, Kontakte SEL Solutions !'], 200);
        }

        $roles = Utils::getRoles($user);

        $token = $user->createToken('api')->accessToken;

        return response()->json(['success'=>true,'token'=>$token,'user'=>$user,'roles'=>$roles], 200);

    }
}

