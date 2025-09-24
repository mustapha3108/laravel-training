<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crowla</title>
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

    {{ $slot }}

    <div class="flex justify-around items-center">

        <a href="{{ route('livealpine') }}" class="link {{ request()->routeIs('livealpine')? "pointer-events-none link-neutral" : "link-primary" }}"
           wire:navigate.hover > livewire alpine counter page</a>
        <a href="{{ route('form') }}" class="link {{ request()->routeIs('form')? "pointer-events-none link-neutral" : "link-primary" }}"
           wire:navigate.hover > form page </a>

    </div>
    </body>
</html>
