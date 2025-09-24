<x-navigation class="">
    <x-slot:title>
        <h1 class="animate-pulse">welcome to the FORM page</h1>
    </x-slot:title>
    <form action="/wubas" method="post">
        @csrf

    <div class="w-96">
      <label class="label-text" for="wuba_name">wuba name</label>
      <input type="text" placeholder="dexter morgan" class="input @error('wuba_name') is-invalid @enderror" id="wuba_name" name="wuba_name"/>
      @error('wuba_name')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="wuba_kill">wuba kill</label>
      <input type="number" placeholder="9000+" class="input @error('wuba_kill') is-invalid @enderror" id="wuba_kill" name="wuba_kill"/>
      @error('wuba_kill')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <input class="btn btn-outline btn-primary m-3" type="submit" value="submit the suckah">

    </form>
</x-navigation>

