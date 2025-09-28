<div class="flex gap-6 flex-col justify-center items-center">

    <div>
        <form class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4"
            wire:submit="createuser">

            <legend class="fieldset-legend" >create user</legend>

            <label class="label">name</label>
            <input type="text" class="input focus:outline-0" placeholder="dexter morgan"
                wire:model="name" />
                @error('name') {{ $message }} @enderror

            <label class="label">email</label>
            <input type="email" class="input focus:outline-0" placeholder="mdex@dex.com"
                wire:model="email"/>
                @error('email') {{ $message }} @enderror

            <label class="label">password</label>
            <input type="password" class="input focus:outline-0" placeholder="dex123"
                wire:model="password"/>
                @error('password') {{ $message }} @enderror

            <input type="submit" class="btn btn-accent" value="create user" wire:loading.remove>
            <input type="submit" class="btn btn-accent" value="loading" wire:loading>

        </form>

        <div x-data="{x:''}">
            <p x-on:post-created.window = "x = 'bazinga' " x-text="x"></p>
        </div>


    </div>
    
    TODO: MAKE A PROPER DISPATCH DEMONSTRATION, PASS DATA, BOTH ALPINE AND JS

    <div class="flex gap-3 flex-wrap">
        @foreach ($users as $user)
            <div class="border-1 border-primary rounded-xl p-4">
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }} </p>

            </div>
        @endforeach
    </div>

</div>
