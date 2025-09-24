<x-navigation class="">
    <x-slot:title>
        <h1>welcome to the DYNAMIC PRODUCT page</h1>
    </x-slot:title>




    <div class="w-screen p-7 flex justify-center gap-7">
        <div class=" border-2 border-primary rounded-xl p-12">
        @if ($wuba)
        <h3>yo wuba is</h3>
        <ul>
            <li>{{ $wuba->id }}</li>
            <li>{{ $wuba->name }}</li>
            <li>{{ $wuba->kill_count }}</li>
        </ul>
        <form action="/wubas/{{ $wuba->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-error" value="delete">
        </form>
        @else
            <h3>no wubas bruh</h3>
        @endif

        @if ($item)
            <h3>items yo</h3>
            <p>the id is {{ $item["id"] }}</p>
            <p>the first is {{ $item["first"] }}</p>
            <p>the second is {{ $item["second"] }}</p>
        @else
            <h3>no item bruh</h3>
        @endif
        </div>

        <div class=" border-2 border-primary rounded-xl p-12">
            <form action="/wubas/ {{ $wuba->id }} " method="post">
                @csrf
                @method('PATCH')
                <div class="w-96">
                  <label class="label-text" for="wuba_name">wuba name</label>
                  <input type="text" placeholder="{{ $wuba->name }}" class="input" id="wuba_name" name="wuba_name"/>
                  <span class="helper-text">change the wuba name if ya want</span>
                </div>

                <div class="w-96">
                  <label class="label-text" for="wuba_kill">wuba kill</label>
                  <input type="number" placeholder="{{ $wuba->kill_count }}" class="input" id="wuba_kill" name="wuba_kill"/>
                  <span class="helper-text">change the kill count if ya want</span>
                </div>

                <input type="submit" class="btn btn-outline btn-primary" value="update">
            </form>
        </div>
    </div>


</x-navigation>
