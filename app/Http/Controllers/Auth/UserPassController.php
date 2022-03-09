<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\User;
use Illuminate\Http\Request;

class UserPassController extends Controller
{
    public function index(){
        return view('auth.forgot');
    }

    public function varify(){
        return view('auth.verify');
    }

    public function makeCode(Request $request){
        $user = User::where('phone', $request->phone)->first();
        $token = rand(100000, 999999);
        $text = 'Your OTP is '.$token;

        if($user){
            SmsController::send_sms($user->phone, $text);

            $user->token = $token;
            $user->update();

            return view('auth.password');

        }else{
            return redirect('/forgot-password')->with('message', 'No user found');
        }
    }

    public function resetPass(Request $request){
        $request->validate([
            'code' => 'numeric|required',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('token', $request->code)->first();

        if($user){
            $user->token = 1234;
            $user->password = bcrypt($request->password);
            $user->update();

            return redirect('/login')->with('message', 'Password updated');

        }else{
            return redirect()->back()->with('message', 'Code is not correct');
        }
    }

    public function varifyCode(Request $request){
        $request->validate([
            'code' => 'numeric|required'
        ]);

        $user = User::where('token', $request->code)->first();

        if($user){
            $user->token = 1234;
            $user->status = 1;
            $user->update();

            return redirect('/home')->with('message', 'You are verified');

        }else{
            return redirect()->back()->with('message', 'Code is not correct');
        }
    }
}
