<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Liveform extends Component
{
    public $name;
    public $email;
    public $password;
    public $users;

    public function createuser(){
        //classic validation, there is a livewire specific syntaxe win #[validate]
        //but it is less powerful with databases and models so i like this better

        $val = $this->validate([
            'name'=>['required'],
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        //User::create($val);
        sleep(2);
        $this->dispatch('post-created');

        //$this->users = User::all();


    }

    public function loginuser(){

    }

    public function logoutuser(){

    }


    public function mount() {
        $this->users = User::all();

    }

    public function render()
    {
        return view('livewire.liveform');
    }
}
