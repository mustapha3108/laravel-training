<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\{Component, WithPagination};


class Liveform extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;

    public $email2;
    public $password2;

    /*super important: after a method is executed, livewire auto executes render method again, so no need to update the ui yourself,
        if for some reason you do want to use a public variable instead then you gotta use dispatches
        keep in mind you can only use paginate inside the render method
        dispatches mean handling the stuff using js, DO NOT FORGET WIRE:IGNORE
    */

    public function createuser(){
        //classic validation, there is a livewire specific syntaxe win #[validate]
        //but it is less powerful with databases and models so i like this better

        if(Auth::guest()){
            $val = $this->validate([
                'name'=>['required'],
                'email'=>['required', 'email', 'unique:users,email'],
                'password'=>['required']
            ]);

            $user = User::create($val);
            Auth::login($user);
            //sleep(2);
            //$this->dispatch('user_created', user: $user);
        }
        else {
            throw ValidationException::withMessages([
                'logged'=>'already logged in'
            ]);
        }
    }

    public function loginuser(){
        if(Auth::guest()){
            $this->validate([
                'email2'=>['required', 'email', 'exists:users,email'],
                'password2'=>['required']
            ]);
            Auth::attempt(['email' => $this->email2, 'password' => $this->password2], true);
        }
        else {
            throw ValidationException::withMessages([
                'logged'=>'already logged in'
            ]);
        }
    }

    public function logoutuser(){
        Auth::logout();
    }

    public function deleteuser($id){
        User::findOrFail($id)->delete();
        /*you can do some stuff like refreshing the page or fetching the data from database again and into user, 
         but the best way is to just handle it in js
         $this->redirectRoute('form', navigate:true);
        */
        //$this->dispatch('user_deleted', id: $id);
    }

    public function fac(){
        User::factory(10)->create();

    }

    public function render()
    {
        return view('livewire.liveform',[
            'users' => User::orderByDesc('created_at')->simplePaginate(5)
    ]);
    }
}
