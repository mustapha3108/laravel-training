<?php

namespace App\Http\Controllers;

use App\Models\serialkiller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class killing extends Controller
{
    public static function killersignup(){

        if(!Auth::check() && !Auth::guard('grim')->check()){
            $newkiller = request()->validate([
                'killer_name'=>['unique:serialkillers,killer_name'],
                'kill_count'=>['numeric']
            ]);
            $killer = serialkiller::create($newkiller);
            Auth::guard('grim')->login($killer);
            return redirect()->route('killing');
        }
        else{
            throw ValidationException::withMessages([
                'already_signed_in'=>'you are already signed in'
            ]);
        }


    }

    public static function killersignin(){

        if(!Auth::check() && !Auth::guard('grim')->check()){
            request()->validate([
                'killer_name'=>['exists:serialkillers,killer_name']
            ]);
            $killer = serialkiller::where('killer_name', request('killer_name'))->firstOrFail();
            Auth::guard('grim')->login($killer);
            request()->session()->regenerate();
            return redirect()->route('killing');
        }
        else{
            throw ValidationException::withMessages([
                'already_signed_in'=>'you are already signed in'
            ]);
        }
    }

    public static function killersignout(){

        if(Auth::guard('grim')->check()){
            Auth::guard('grim')->logout();
        }
        return redirect()->route('killing');
    }
}
