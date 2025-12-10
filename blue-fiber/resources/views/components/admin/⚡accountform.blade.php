<?php

use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;


new class extends Component
{
    public $username, $password;
    public $oldpassword, $newpassword, $newpassword_confirmation;

    public function updateusername(){
        $this->validate([
            'username'=>'required|string|min:3|max:100',
            'password'=>['string', 'required']
        ]);
        $admin = Admin::findOrFail(1);
        if($admin->password == $this->password){
            $admin->update(['username'=>$this->username]);
            $this->dispatch('done');
        }else{
            throw ValidationException::withMessages([
            'password'=>'wrong password'
        ]);
        }
    }
    
    public function updatepassword(){
        $this->validate([
            'oldpassword'=>['string', 'required'],
            'newpassword'=>['string', 'required','confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ]);
        $admin = Admin::findOrFail(1);
        if($admin->password == $this->oldpassword){
            $admin->password = $this->newpassword;
            $admin->save();
            $this->dispatch('done');
        }else{
            throw ValidationException::withMessages([
            'olpassword'=>'wrong password'
        ]);
        }
    }
};
?>

<div class="flex flex-wrap gap-2 justify-center mt-30">

    <form wire:submit='updateusername' class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4 m-6">
        <legend class="fieldset-legend">Update Username</legend>  

        <label class="label">username</label>
        <input type="text" class="input" placeholder="username" wire:model='username'/>  
        @error('username') <p class='text-sm text-error'>{{ $message }} </p> @enderror

        <label class="label">Old Password</label>
        <input type="password" class="input" placeholder="Password" wire:model='password'/>
        @error('password') <p class='text-sm text-error'>{{ $message }} </p> @enderror

        <button type="submit" class="btn btn-neutral mt-4">update username</button>
    </form>

    <form wire:submit='updatepassword' class="fieldset bg-base-200 border-base-300 rounded-box w-md border p-4 m-6">
        <legend class="fieldset-legend">Update Password</legend>   

        <label class="label">Old Password</label>
        <input type="password" class="input" placeholder="Password" wire:model='oldpassword'/>
        @error('oldpassword') <p class='text-sm text-error'>{{ $message }} </p> @enderror

        <label class="label">New Password</label>
        <input type="password" class="input" placeholder="Password" wire:model='newpassword'/>  
        @error('newpassword') <p class='text-sm text-error'>{{ $message }} </p> @enderror

        <label class="label">New Password confirmation</label>
        <input type="password" class="input" placeholder="Password" wire:model='newpassword_confirmation'/>

        <button type="submit" class="btn btn-neutral mt-4">update password</button>
    </form>

    <div x-on:Done.window='my_modal_5.showModal()'></div>

    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
      <div class="modal-box">

        <div class="flex flex-col justify-center items-center gap-8">
            <svg class="size-25 fill-success"
                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                <g><rect fill="none" height="24" width="24" y="0"/></g><g><g><g><polygon points="2,22 16,17 7,8"/><path d="M14.53,12.53L21,6.05l1.48,1.48l1.06-1.06L21,3.93l-7.53,7.53L14.53,12.53z"/><path d="M10.94,6L9.47,7.47l1.06,1.06l2.54-2.54l-2.54-2.53L9.47,4.53L10.94,6z"/><path d="M18.97,9.97l-3.5,3.5l1.06,1.06L19,12.06l2.5,2.49l1.06-1.06L18.97,9.97z"/><path d="M15.97,4.97l-4.5,4.5l1.06,1.06L18.07,5l-3.53-3.53l-1.06,1.06L15.97,4.97z"/></g></g></g></svg>
            <h3 class="text-lg font-bold">update successful</h3>
        </div>

        <div class="modal-action">
          <form method="dialog">
            <button class="btn">Close</button>
          </form>
        </div>
      </div>
    </dialog>
    
</div>