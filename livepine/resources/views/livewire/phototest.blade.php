<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="flex justify-center items-center">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">sign up</legend>      
            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" wire:model='email'/>        
            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" wire:model='password'/>      
            <input type="file" class="file-input file-input-dash" wire:model='photo'/>   
            @error('photo')
                <p class="text-red-500">{{ $message }} </p>
            @enderror    
            <button class="btn btn-outline mt-4" wire:click='save'>Login</button>
        </fieldset>

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">sign up</legend>      
            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" wire:model='email'/>        
            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" wire:model='password'/>      
            <input type="file" class="file-input file-input-dash" wire:model='photo'/>   
            @error('photo')
                <p class="text-red-500">{{ $message }} </p>
            @enderror    
            <button class="btn btn-outline mt-4" wire:click='save2'>Login</button>
        </fieldset>
    </div>

    <img src="{{ Storage::url($path)}}" alt="yo" class="w-1/2 h-1/4">
    <p>{{$path}}</p>
    <p>{{ Storage::url($path)}} </p>
    <img src="{{ asset('storage/' . $path) }}" alt="User photo">
    <img src="{{ asset('storage/app/private/' . $path) }}" alt="">
</div>
