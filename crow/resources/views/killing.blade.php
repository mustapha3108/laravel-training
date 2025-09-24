<x-navigation class="">
    <x-slot:title>
        <h1 class="animate-pulse text-primary">i wanna learn guards</h1>
    </x-slot:title>
    @guest
        <h1>yoy are guest</h1>
    @endguest
    @auth
        <h1>you are user</h1>
    @endauth

    @auth('grim')
        <h1>you are killer: {{Auth::guard('grim')->user()->killer_name}}</h1>
    @endauth
    @guest('grim')
        <h1>you are killer guest</h1>
    @endguest

    @error('already_signed_in')
                <h1 class="text-error"> {{$message}}</h1>
    @enderror

    <div class="flex justify-center gap-12 px-8">
        <div class="min-w-1/3 flex flex-col gap-3">
            <form action="/killersignup" method="post" class="bg-neutral p-6 border-2 rounded-2xl border-seconary flex flex-col gap-3">
                @csrf
                <h2>sign up killer</h2>
                <input class="input" type="text" name="killer_name" id="killer_name" placeholder="killer name">
                <input class="input" type="number" name="kill_count" id="kill_count" placeholder="kill count">
                <input class="btn-primary btn-outline btn" type="submit" value="sign up">
            </form>

            <form action="/killersignin" method="post" class="bg-neutral p-6 border-2 rounded-2xl border-seconary flex flex-col gap-3">
                @csrf
                <h2>log in killer</h2>
                <input class="input" type="text" name="killer_name" id="killer_name" placeholder="killer name">
                <input class="btn-primary btn-outline btn" type="submit" value="sign in">
            </form>

            @auth('grim')
            <form action="/killersignout" method="post" class="flex justify-center">
                @csrf
                <input class="btn btn-md btn-error w-full" type="submit" value="sign out">
            </form>
            @endauth
        </div>

        <div class="flex gap-4 flex-wrap">
            @foreach ($victims as $victim)
                <div class="border-2 rounded-md p-6 border-secondary flex flex-col gap-2 bg-neutral">
                    <h3><strong>victim:</strong> {{$victim->name}}</h3>
                    <p><strong>killed by:</strong> {{ $victim->serialkillers->killer_name }} </p>
                    @if(Gate::forUser(Auth::guard('grim')->user())->allows('edit_victim', $victim))
                        <a href="" class="btn btn-info">edit or delete</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div>
        {{ $victims->links() }}
    </div>



</x-navigation>
