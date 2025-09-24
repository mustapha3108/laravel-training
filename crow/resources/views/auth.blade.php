<x-navigation class="">
    <x-slot:title>
        <h1 class="animate-pulse">GOTTA LEARN AUTH</h1>
    </x-slot:title>
    @guest
        <h2 class="text-primary text-2xl">you are a guest</h2>
    @endguest
    @auth
        <h2 class="text-primary text-2xl">you are a user</h2>
        <form action="/logout" method="post">
            @csrf
            <input type="submit" value="log out" class="btn btn-error btn-soft btn-sm">
        </form>
    @endauth


    <div class="flex justify-center gap-8">

    <form action="/signup" method="post" class="p-6 border-2 rounded-xl border-primary h-120 flex flex-col justify-center gap-2">
        @csrf
    <h2 class="text-2xl text-secondary animate-pulse">sign up form</h2>
    <div class="w-96">
      <label class="label-text" for="name">user name</label>
      <input type="text" placeholder="dexter morgan" class="input @error('user_name') is-invalid @enderror" id="name" name="name"/>
      @error('user_name')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="crow_curse">crow curse</label>
      <input type="text" placeholder="9000+" class="input @error('crow_curse') is-invalid @enderror" id="crow_curse" name="crow_curse"/>
      @error('crow_curse')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="email">email</label>
      <input type="email" placeholder="9000+" class="input @error('email') is-invalid @enderror " id="email" name="email"/>
      @error('email')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="password">password</label>
      <input type="text" placeholder="9000+" class="input @error('password') is-invalid @enderror " id="password" name="password"/>
      @error('password')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="password_confirmation">password confirmation</label>
      <input type="text" placeholder="9000+" class="input @error('password') is-invalid @enderror " id="password_confirmation" name="password_confirmation"/>
      @error('password')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <input class="btn btn-outline btn-primary m-3" type="submit" value="submit the suckah">
    </form>

    <!-- second form !-->
    <form action="/login" method="post" class="p-6 border-2 rounded-xl border-primary h-120 flex flex-col justify-between">
    @csrf
    <h2 class="text-2xl text-secondary animate-pulse">log in form</h2>

    <div class="flex flex-col gap-3">
    <div class="w-96">
      <label class="label-text" for="log_email">user email</label>
      <input type="email" placeholder="dexter morgan" class="input @error('log_email') is-invalid @enderror" id="log_email" name="log_email"/>
      @error('log_email')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>

    <div class="w-96">
      <label class="label-text" for="password_log">password</label>
      <input type="text" placeholder="9000+" class="input @error('password_log') is-invalid @enderror" id="password_log" name="password_log"/>
      @error('password_log')
        <p class="text-xs text-error">{{$message}}</p>
      @enderror
    </div>
    </div>
    <input class="btn btn-outline btn-primary m-3" type="submit" value="submit the suckah">
    </form>

    </div>



</x-navigation>
