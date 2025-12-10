@props([
    'class' => '',
    'route' => '',
    'current' => ''
])

<a href="{{ route($route) }}"  {{ $attributes->merge(['class' => "$class"]) }} wire:navigate wire:current.exact="{{ $current }}">
    {{ $slot }}
</a>