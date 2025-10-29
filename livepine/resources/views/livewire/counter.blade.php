<div x-data="counter" class="border-2 border-accent p-4 rounded-2xl my-6 md:block flex gap-3">

    <div class="text-center flex justify-center items-center gap-10 flex-wrap">


        <div class="p-8 flex flex-row-reverse justify-center items-center gap-8 flex-wrap">

            <div class="flex flex-col justify-center items-center">
                <h1 class="text-xl m-3" x-text='$wire.count'></h1>
                {{-- {{ $count }} also possible but i like handling it with js better because that way it re-renders when controlled by alpine --}}
                <h2>Livewire</h2>
            </div>

            <div class="flex flex-col gap-2">
                <button wire:click="increment" class="btn">+</button>
                <button wire:click="decrement" class="btn">-</button>
                <button wire:click="resetc" class="btn">0</button>
            </div>

        </div>

        <div class="p-8 flex justify-center items-center gap-8 flex-wrap" >

            <div class="flex flex-col justify-center items-center">
                <h1 class="text-xl m-3" x-text="x"></h1>
                <h2>Alpine</h2>
            </div>

            <div class="flex flex-col gap-2">
                {{-- all of these can be done with either the inline classic alpine or alpine.data in js file --}}
                <button class="btn" @click="x++">add to x</button>
                <button class="btn" @click="subx">sub from x</button>
                <button class="btn" @click="resetx">reset</button>
            </div>

        </div>


    </div>

    <div>

        <h2 class="text-center mt-10 mb-5">with inline alpine</h2>
        <div class="flex gap-2 justify-center flex-wrap">
            {{-- all of these can be done with either the inline classic alpine or alpine.data in js file, @click and x-on:click are the same --}}
            <button class="btn" x-on:click="$wire.count = x">sync livewire to alpine</button>
            <button class="btn" x-on:click="x = $wire.count">sync alpine to livewire</button>
            <button class="btn" @click="$wire.count++">add livewire with coount</button>
            <button class="btn" @click="$wire.increment">add livewire with method</button>
            <button class="btn" @click="x++; $wire.count = x">add to x synched</button>
            <button class="btn" @click="x++; $wire.count++">add to both</button>
        </div>

        <h2 class="text-center mt-10 mb-5">with alpine functions</h2>
        <div class="flex gap-2 justify-center flex-wrap">
            {{-- all of these can be done with either the inline classic alpine or alpine.data in js file , @click and x-on:click are the same--}}
            <button class="btn" x-on:click="syncla">sync livewire to alpine</button>
            <button class="btn" x-on:click="syncal">sync alpine to livewire</button>
            <button class="btn" @click="addl">add livewire with coount</button>
            <button class="btn" @click="addlm">add livewire with method</button>
            <button class="btn" @click="adds">add to x synched</button>
            <button class="btn" @click="addb">add to both</button>
        </div>

        <h2 class="text-center mt-10 mb-5">recieving dispatch from livewire</h2>
        <div class="text-center">
            <button wire:click="send_dispatch" class="btn btn-dash">send dispatch from livewire</button>
            <div>
                <p>vanilla js response:</p>
                <p id="dr" class="text-success" wire:ignore></p>
            </div>
            <div>
                <p>alpine js response:</p>
                <p x-data="{ x:'' }" x-on:dis_test.window="x = 'dispatch receieved, the message is: ' + $event.detail.message" x-text="x"
                 class="text-success"></p>
            </div>
        </div>
    </div>

    <div>
        <button class="btn" wire:click="createtext">craete text file with laravel file system</button>
    </div>

</div>
