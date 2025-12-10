<x-layout.layout>

    
    
    <x-vid />

    @if ($an != '')
    <div class="w-full bg-neutral mt-12">
        {{ $an }}
    </div>
    @endif

    <div class="marquee">
      <div class="marquee-inner">
        🔥 Big sale — 50% off • 🚚 Free shipping • 🆕 New arrivals
      </div>
    </div>

    <div class="text-center">carousels for best products here</div>
    <!--categories -->
    <x-classyshirts />
    <x-casualshirts />
    <x-animeshirts />


</x-layout.layout>