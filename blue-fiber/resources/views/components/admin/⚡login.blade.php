<?php

use Livewire\Component;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;


new class extends Component
{
    public $username;
    public $password;

    public function login(){
        
        //validation
        $user = Admin::find(1);
        if ($user->username == $this->username && $user->password == $this->password) {
            Auth::guard('admin')->login($user, true);
            return $this->redirectRoute('admin', navigate:true);
        }
        throw ValidationException::withMessages([
            'password'=>'wrong password or username'
        ]);
        
    }
    
};
?>

<div class="flex flex-col justify-center items-center">

    <h1 class="text-center text-4xl mt-12">Welcome Back Admin</h1>

    <form wire:submit='login' class="fieldset bg-base-200 border-base-300 rounded-box w-[90%] md:w-lg border p-4 mt-12">

      <label class="label">User name</label>
      <input type="text" class="input w-full outline-0" placeholder="BATMAN" wire:model="username"/>
      @error('username') <p class="text-error">{{ $message }} </p> @enderror

      <label class="label">Password</label>
      <input type="password" class="input w-full outline-0" placeholder="abcd123....just kidding" wire:model="password"/>
      @error('password') <p class="text-error">{{ $message }} </p> @enderror

      <input type="submit" class="btn btn-neutral mt-4" value="login" />

    </form>

</div>