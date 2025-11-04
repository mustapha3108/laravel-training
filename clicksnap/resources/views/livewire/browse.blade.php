<div class="flex flex-col justify-center items-center">
    <!-- searchabr, with categories and auto-complete-->
    <form class="flex flex-col items-center w-10/10"  wire:submit='search'>
        <div class="flex justify-center w-10/10">
            <input wire:model.live='query' type="text" class="input myinput mb-0 w-7/10">
            <span class="btn btn-dash w-2/10">search</span>
        </div>
        <div class="relative flex justify-center w-10/10">
            <ul class="absolute flex flex-col justify-start items-start w-9/10 bg-base-100">
                @if ($suggestions)
                    @foreach ($suggestions as $sug)
                        <li class="w-10/10 border-1 border-gray-500 p-2  hover:bg-gray-900">{{$sug}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </form>


    <!-- displaying the results, grid, foreach -->
    <div class="masonry p-10">
        @if ($results)
            @foreach ($results as $res)
            <div class="masonry-item overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition group bg-base-200">
                <img src="{{ Storage::url($res->path) }}" alt="" class="">
            </div>
            @endforeach
        @endif 
    </div>

    @if ($results) {{ $results->links() }}  @endif
        
   
</div>