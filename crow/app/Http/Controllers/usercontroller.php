<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\password;

class usercontroller extends Controller
{
    public static function signup(){
        $newuser = request()->validate([
            'crow_curse'=>['min:3'],
            'name'=>['min:3'],
            'email'=>['email', 'unique:users,email', Password::min(1)->letters()],
            'password'=>['confirmed'],
        ]);
        $user = User::create($newuser);
        Auth::login($user);
        return redirect()->route('auth');
    }

    public static function login(){
        request()->validate([
            'log_email'=>['email', /*'exists:users,email'*/],
            'password_log'=>[],
        ]);
        
        $authed = Auth::attempt([
            'email'=>request('log_email'),
            'password'=>request('password_log')
        ]);
        if ($authed == false){
            throw ValidationException::withMessages([
                'password'=>'wrong password mate'
            ]);
        }

        request()->session()->regenerate();
        return redirect()->route('auth');
    }

    public static function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
