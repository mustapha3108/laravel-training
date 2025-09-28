<div class="flex gap-6 flex-col justify-center items-center">

    <div class="flex gap-3 justify-center">
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

            <input type="submit" class="btn btn-accent" value="create user" wire:loading.attr="disabled" wire:target="createuser" @auth disabled @endauth>
            @error('logged') {{ $message }} @enderror
        </form>

        <div class="flex flex-col justify-start items-center gap-6">
        <form class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4"
            wire:submit="loginuser">

            <legend class="fieldset-legend" >login user</legend>

            <label class="label">email</label>
            <input type="email" class="input focus:outline-0" placeholder="mdex@dex.com"
                wire:model="email2"/>
                @error('email2') {{ $message }} @enderror

            <label class="label">password</label>
            <input type="password" class="input focus:outline-0" placeholder="dex123"
                wire:model="password2"/>
                @error('password2') {{ $message }} @enderror

            <input type="submit" class="btn btn-accent" value="create user" wire:loading.attr="disabled" wire:target="loginuser" @auth disabled @endauth>
            @error('logged') {{ $message }} @enderror
        </form>
        <button @guest disabled @endguest class="btn btn-error" wire:click="logoutuser">@auth logout @endauth @guest you are logged out @endguest</button>
        </div>

    </div>

    <button class="btn btn-accent" wire:click="fac">create random users</button>

    <div class="flex gap-3 flex-wrap" id="user_container">
        @foreach ($users as $user)
            <div class="border-1 border-primary rounded-xl p-4 text-center" id="user @json($user->id)">
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }} </p>
                <button class="btn btn-error" wire:click="deleteuser(@json($user->id))"> deleter user @json($user->id)</button>
            </div>
        @endforeach
    </div>
    <div>
        {{$users->links()}}
    </div>

</div>
