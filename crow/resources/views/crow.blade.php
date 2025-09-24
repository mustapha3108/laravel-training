<x-navigation class="">
    <x-slot:title>
        <h1 class="animate-pulse">welcome to the HOME/CROW page</h1>
    </x-slot:title>
    @guest
        <h2 class="text-primary text-2xl">you are a guest</h2>
    @endguest
    @auth
        <h2 class="text-primary text-2xl animate-pulse">you are a user</h2>
    @endauth

    <p>other main stuff</p>
    <h3 class="text-primary">passing variable practice</h3>
    <p>the variable passed is {{ $stuff }}</p>
    <h3>items:</h3>
    <ul >
    @foreach ($arr as $ar)
        <li><a class="link" href='{{ route('dy', ['id'=>$ar['id'] ])  }}'>- {{ $ar['first'] }} is like {{$ar['second']}} </a></li>
    @endforeach
    </ul>
    <h3 class="text-primary">passing eloquent variable practice</h3>
    <div >
    <ul >
        @foreach ($wubas as $wuba)
            <li><a class="p-6 link" href="{{ route('dy', ['id'=>$wuba->id]) }}"> - {{$wuba->id}} | {{$wuba->name}} | {{ $wuba->kill_count }} by <br>
             @foreach ($wuba->lubas as $luba)
                    {{ $luba->name }}
            @endforeach</a></li>
            <form action="/wubas/{{ $wuba->id }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-error" value="delete">
            </form>
        @endforeach
    </ul>
    </div>
    <div class="w-9/10 p-4">{{$wubas->links()}}</div>
</x-navigation>












