<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

new class extends Component
{
    use WithFileUploads;
    //id, name, type, category, keywords, description, sales, photo paths (yes multiple, string parsing ma dude);
    public $title, $type, $category, $keywords, $description, $price;
    public $pripho;
    public $photos = [];

    public function addshirt(){
        $this->validate([
            'title'=>['required', 'string', 'max:255'],
            'type'=>['required', 'string', 'max:255'],
            'category'=>['required', 'string', 'max:255'],
            'keywords'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string', 'max:255'],
            'pripho'=>['image', 'max:10240'],
            'price'=>['required', 'numeric'],
            'photos'=>['array', 'max:5'],
            'photos.*'=>['image', 'max:10240']
        ]);
        $primary_photo = $this->pripho->store(path:'shirts', options:'public');
        $photo = [];
        for ($i=0; $i < count($this->photos); $i++) { 
            $photo[$i] = $this->photos[$i]->store(path:'shirts', options:'public');
        }
        for ($i=count($this->photos); $i < 5; $i++) { 
            $photo[$i] = null;
        }
        Product::create([
            'name'=>$this->title,
            'type'=>$this->type,
            'category'=>$this->category,
            'keywords'=>$this->keywords,
            'description'=>$this->description,
            'primary_photo'=>$primary_photo,
            'photo1'=>$photo[0],
            'photo2'=>$photo[1],
            'photo3'=>$photo[2],
            'photo4'=>$photo[3],
            'photo5'=>$photo[4]
        ]);

        $this->dispatch('newshirt');

    }
    
};
?>

<div class="flex flex-col justify-center items-center">
   <h1>livewire works</h1>
    <h1>TODO:</h1>
    <p>gotta edit php file to allow more post size->done</p>
    <p>form that accepts multiple file uploads</p>
    <p>one major photo + 5 secondary ones, why 5? idk i pulled the number out of joey diaz's ass</p>
    <p>get it done by 9:30 or you're a disgrace</p>
    <p>edit the migration to allow for more columns, string parsing is stupid, don't forget nullable and gotta redefine admin and announcement->done</p>

    <h1 class="text-4xl text-center text-accent my-6">Add A new Shirt</h1>

    <form wire:submit='addshirt' class="fieldset flex flex-col gap-3 bg-base-200 border-base-300 rounded-box border p-4 w-[90%]">

        <legend class="fieldset-legend"></legend>  

        <label class="label">title</label>
        <input type="text" class="input w-full" placeholder="shirt title" wire:model='title'/>  
        @error('title') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">description</label>
        <textarea class="textarea w-full" placeholder="this super shirt helped me beat the joker...max 255 char" wire:model='description'></textarea>
        @error('description') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">Keywords</label>
        <textarea class="textarea w-full" placeholder="funny, meme...max 255 char" wire:model='keywords'></textarea>
        @error('keywords') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">Price</label>
        <input type="number" step="0.1" class="input w-full" placeholder="9001" wire:model='price'/>  
        @error('price') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">type</label>
        <select class="select w-full" wire:model='type'>
            <option>Pick a type</option>
            <option>Men</option>
            <option>Women</option>
            <option>Unisex</option>
            <option>children</option>
            <option>All</option>
        </select>
        @error('type') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">pick a cetegory</label>
        <select class="select w-full" wire:model='category'>
            <option>Pick a category</option>
            <option>classy</option>
            <option>funny/casual</option>
            <option>Anime</option>
        </select>
        @error('category') <p class="text-error"> {{ $message }} </p> @enderror

        <label class="label">Primary Photo | max size: 10mb</label>
        <input type="file" accept="image/*" class="file-input file-input-accent w-full" wire:model='pripho'/> 
        @error('pripho') <p class="text-error"> {{ $message }} </p> @enderror 

        <label class="label">Optional Additional Photos <br> up to 5 | max size: 10mb</label>
        <input type="file" id="photofiles" accept="image/*" multiple class="file-input file-input-secondary file-input-xl size-50 w-full" wire:model='photos'/>  
        @error('photos') <p class="text-error"> {{ $message }} </p> @enderror

        <button type="submit" class="btn btn-primary mt-4">Add new shirt !</button>
    </form>

    <div x-on:newshirt.window='my_modal.showModal()'></div>

    <dialog id="my_modal" class="modal modal-bottom sm:modal-middle">
      <div class="modal-box">

        <div class="flex flex-col justify-center items-center gap-8">
            <svg class="size-25 fill-success"
                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                <g><rect fill="none" height="24" width="24" y="0"/></g><g><g><g><polygon points="2,22 16,17 7,8"/><path d="M14.53,12.53L21,6.05l1.48,1.48l1.06-1.06L21,3.93l-7.53,7.53L14.53,12.53z"/><path d="M10.94,6L9.47,7.47l1.06,1.06l2.54-2.54l-2.54-2.53L9.47,4.53L10.94,6z"/><path d="M18.97,9.97l-3.5,3.5l1.06,1.06L19,12.06l2.5,2.49l1.06-1.06L18.97,9.97z"/><path d="M15.97,4.97l-4.5,4.5l1.06,1.06L18.07,5l-3.53-3.53l-1.06,1.06L15.97,4.97z"/></g></g></g></svg>
            <h3 class="text-lg font-bold">operation successful</h3>
        </div>

        <div class="modal-action">
          <form method="dialog">
            <button class="btn">Close</button>
          </form>
        </div>
      </div>
    </dialog>

</div>