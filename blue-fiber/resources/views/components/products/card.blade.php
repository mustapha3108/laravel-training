@props([
    'path'=> '',
    'title'=> '',
    'link'=>'',
    'price'=>''
])

<a href="{{ $link }}"
 {{ $attributes->merge(['class' => 'bg-base-300 w-56 h-82 m-5 p-3 rounded']) }}>
    
    <img
    src="{{ Storage::url($path) }}" 
    class="size-56"
    >
    <p class="truncate text-xl text-primary text-center mt-2">{{ $title }}</p>

    <p class="truncate text-md text-warning text-center mt-1">{{ $price }} DA</p>
</a>