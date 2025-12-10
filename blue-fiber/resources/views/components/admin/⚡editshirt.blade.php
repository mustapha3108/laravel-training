<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

new class extends Component
{
    use WithPagination;

    public string $title = '';
    public string $category = '';
    public string $type = '';
    public $poch = 0; //0: random; 1: cheapest; 2: most expansive; 3: best selling;  4: latest;

    public function filter(){
        $this->poch = (int) $this->poch;
        //dd($this->title);
        //should probably validate
    }

    public function maquery(){
        return Product::query()
        ->when($this->title, fn($q)=> $q->where('name', 'like', "%{$this->title }%")) //('name', 'like', "%{$this->title }%"))
        ->when($this->category, fn($q)=> $q->where('category', $this->category))
        ->when($this->type, fn($q)=> $q->where('type', $this->type))
        ->when($this->poch, function($q) {
         switch ($this->poch) {
            case 1:
                $q->orderBy('price', 'asc');
                break;
            case 2:
                $q->orderBy('price', 'desc');
                break;
            case 3:
                $q->orderBy('sales', 'desc');
                break;
            case 4:
                $q->orderBy('created_at', 'desc');
                break;
         }}
        );
    }

    public function render(){
        $res = $this->maquery()->paginate(2);
        return view('admin.⚡editshirt',[
            'shirts' => $res
        ]);
    }
    
};
?>


<div>

    {{-- some sort of filtering thing, so bubble search bar with parameters under --}}
    <div class="bg-base-300 p-3 rounded-2xl m-2">
        <form wire:submit='filter' class="w-full flex flex-col justify-center items-center gap-2">
            {{-- search bat  + submit button --}}
            <div class="join rounded w-[95%]">
                <input wire:model='title' class="input input-ouline focus:outline-0 join-item w-full" placeholder="batman shirt" />
                <button type="submit" class="btn btn-accent btn-outline join-item rounded-r-full">Search</button>
            </div>

            {{-- filter parameters i guess --}}
            <div class="flex w-[95%] justify-between">
                <select wire:model='category' class="select md:select-md select-sm select-outline mx-2">
                    <option value="">Category</option>
                    <option value="Classy">Bourgeois</option>
                    <option value="Casula">Whateves</option>
                    <option value="Anime">Dweeb</option>
                </select>

                <select wire:model='type' class="select md:select-md select-sm select-outline mx-2">
                    <option value="">type</option>
                    <option value="Men">the hairy ones</option>
                    <option value="Women">the nagging ones</option>
                    <option value="Children">the forbiden ones</option>
                    <option value="Unisex">the everything goes ones</option>
                    <option value="All">the perverted ones</option>
                </select>

                <select wire:model.live='poch' class="select md:select-md select-sm select-outline mx-2">
                    <option value='0'>order</option>
                    <option value="1">cheapest</option>
                    <option value="2">most expensive</option>
                    <option value="4">latest</option>
                    <option value="3">best selling</option>
                </select>
            </div>
        </form>
    </div>

    <div class="flex flex-wrap justify-center items-center w-full">
        {{-- display results here in the form of these product cards, each card has a link to some edit page --}}
        @foreach ($shirts as $shirt)
            <x-products.card 

            class="p-5"
            title="{{$shirt->name}}"
            path="{{$shirt->primary_photo}}"
            price="{{$shirt->price}}"

            link="{{ (Route::currentRouteName() == 'update') ? route('edit', ['id'=>$shirt->id]) : route('welcome') }}"
            wire:navigate
            />
        @endforeach
    </div>

    <div class="flex justify-center">
        {{$shirts->links()}}
    </div>
</div>