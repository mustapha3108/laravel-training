<!DOCTYPE html>
<html lang="en" data-theme="shadcn-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        console.log("js top")
        if(localStorage.getItem("theme")){
            document.documentElement.setAttribute("data-theme",localStorage.getItem("theme"))
        }
    </script>
</head>
<body class="flex justify-center items-center flex-col gap-4 overflow-x-hidden">
<div {{ $attributes->merge(['class' => 'w-screen p-6 flex justify-evenly bg-gray-800']) }}>
    @php
        $stuff=true;
    @endphp
    <a href="{{ route('home') }}" class="{{ request()->is('/') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2  transition-colors duration-500 text-xl ">
         home</a>
    <a href="{{ route('about') }}" class="{{ request()->is('about') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2 transition-colors duration-500 text-xl ">
         about</a>
    <a href="{{ route('contact') }}" class="{{ request()->is('contact') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2 transition-colors duration-500 text-xl ">
         contact</a>
    <a href="{{ route('fr') }}" class="{{ request()->is('fr') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2 transition-colors duration-500 text-xl ">
         form</a>
    <a href="{{ route('auth') }}" class="{{ request()->is('auth') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2 transition-colors duration-500 text-xl ">
         auth</a>
    <a href="{{ route('killing') }}" class="{{ request()->is('killing') ?  "text-base-100 border-b-2 rounded-xs border-b-base-100" : "link link-animated hover:text-secondary-content drop-shadow-[0_0_1px_black]"}} font-bold rounded-xl p-2 transition-colors duration-500 text-xl ">
         killing</a>
</div>

{{ $title }}
{{ $slot }}

</body>
</html>
