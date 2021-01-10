<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{ 
    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'address' => 'required|min:15',
            'phone_number' => 'required|numeric|min:10',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $user->save();

        return redirect(url('/login'));
    }

    public function login(Request $request){
        $credential = $request->only('email', 'password');

        $messages = [
            "email.exists" => "Email doesn't exists",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
        ], $messages);

        if ($request->remember != null) {
            Auth::attempt($credential, true);

            $minute = 120;
            $rememberToken = Auth::getRecallerName();
            Cookie::queue($rememberToken, Cookie::get($rememberToken), $minute);
        } else {
            Auth::attempt($credential);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt([ 'email'=>$request->email, 
                                'password'=>$request->password], 
                                $request->remember)) {
                return redirect('/');
            }

            return redirect()->back()->withInput($request->only('email', 'password'))
            ->withErrors(['password' => 'Wrong password']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
