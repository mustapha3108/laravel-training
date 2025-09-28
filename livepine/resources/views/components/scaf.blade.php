<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>livepine</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
    </head>
    <body>

    {{ $slot }}

    <div class="flex justify-around items-center">

        <a href="{{ route('livealpine') }}" class="link link-accent" wire:current.exact="text-gray-500 pointer-events-none"
           wire:navigate.hover > livewire alpine counter page</a>
        <a href="{{ route('form') }}" class="link link-accent" wire:current.exact="text-gray-500 pointer-events-none"
           wire:navigate.hover > form page </a>

    </div>
    </body>
</html>
