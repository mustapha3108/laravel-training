<?php

use App\Http\Controllers\killing;
use App\Http\Controllers\usercontroller;
use App\Jobs\Createwuba;
use App\Mail\crowtest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\items;
use App\Models\victim;
use App\Models\wuba;
use GuzzleHttp\Promise\Create;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Mail;
Route::view('/', 'crow', ['stuff'=>25, 'arr'=>items::show(), 'wubas'=>wuba::with('lubas')->latest()->cursorPaginate(5)] )->name('home');

//Route::view('/about', 'about')->name('about');
Route::get('/about', function(){
    Createwuba::dispatch();
    //Mail::to('tueure750@gmail.com')->queue(new crowtest()); //send
    return view('about', ['Current_driver' => Queue::getConnectionName()]);
})->name('about');


Route::view('/contact', 'contact')->name('contact')->middleware('auth');
Route::view('/form', 'form')->name('fr');
Route::view('/auth', 'auth')->name('auth');

Route::get('/items/{id}', function($id){
    if(Auth::guard('grim')->check()){
        Gate::forUser(Auth::guard('grim')->user())->authorize('edit_victim', victim::find($id));
    }
    $item = items::find($id);
    $wuba = wuba::find($id);
    return view('dy',  ['id'=>$id, 'item' => $item, 'wuba'=>$wuba]);
})->name('dy');

Route::post('/wubas', function(){

    request()->validate([
        'wuba_name'=>['required', 'min:3'], //exists, unique
        'wuba_kill'=>['required', function($attribute, $value, $fail){
                                    if($value<3){
                                        $fail('not much of a serial killer');}}]
    ],[
        'wuba_name.required' => 'The Wuba must have a name! yo',
        'wuba_name.min' => 'The Wuba name must be at least :min characters. yo',
        'kill_count.required' => 'You need to enter the kill count. yo',
        'kill_count.integer' => 'Kill count must be a number. yo',
    ]);
    wuba::create([
        'name'=>request('wuba_name'),
        'kill_count'=>request('wuba_kill')
    ]);
    return redirect()->route('home');
});


Route::patch('/wubas/{id}', function($id){
    request()->validate([
        'wuba_name'=>['min:3'],
        'wuba_kill'=>['numeric','min:3']
    ]);

    $wuba = wuba::findOrFail($id);

    $wuba->update([
        'name'=>request('wuba_name'),
        'kill_count'=>request('wuba_kill')
    ]);

    return redirect()->route('home');
});

Route::delete('/wubas/{id}', function($id){

    $wuba = wuba::findOrFail($id);
    if($wuba->lubas){
        foreach($wuba->lubas as $dl){
            $dl->delete();
        }
    }
    $wuba->delete();

    return redirect()->route('home');
});

Route::post('/signup', [usercontroller::class, 'signup']);
Route::post('/login', [usercontroller::class, 'login']);
Route::post('/logout', [usercontroller::class, 'logout']);


Route::view('/killing', 'killing', ['victims'=>victim::with('serialkillers')->latest()->simplepaginate(6)])->name('killing');
Route::post('/killersignin', [killing::class, 'killersignin']);
Route::post('killersignup', [killing::class, 'killersignup']);
Route::post('/killersignout', [killing::class, 'killersignout']);
