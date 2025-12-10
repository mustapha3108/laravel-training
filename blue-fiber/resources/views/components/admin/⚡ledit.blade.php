<?php

use Livewire\Component;
use App\Models\Product;

new class extends Component
{
  public Product $shirt;
  public $name;
  public $type;
  public $category;
  public $price;
  public $description;
  public $keywords;
  public $primary_photo, $photo1, $photo2, $photo3, $photo4, $photo5;

  public function mount(){
  $this->name = $this->shirt->name;
  $this->type = $this->shirt->type;
  $this->category = $this->shirt->category;
  $this->price = $this->shirt->price;
  $this->description = $this->shirt->description;
  $this->keywords = $this->shirt->keywords;
  }


  public function editinfo(){

    $this->validate([
      'name'=>['required', 'string', 'max:255'],
      'type'=>['required', 'string', 'max:255'],
      'category'=>['required', 'string', 'max:255'],
      'keywords'=>['required', 'string', 'max:255'],
      'description'=>['required', 'string', 'max:255'],
      'price'=>['required', 'numeric']
    ]);

    $this->shirt->update([
      'name'=>$this->name,
      'type'=>$this->type,
      'category'=>$this->category,
      'keywords'=>$this->keywords,
      'description'=>$this->description,
      'price'=>$this->price
    ]);

  }

  public function editprimaryphoto(){
    $this->validate([
      'primary_photo'=>['required', 'image', 'max:10240']
    ]);

  }

};
?>

<div>
    {{-- create form thing here that updates stuff, i hate webdev, scratch that i hate all of programming --}}
  {{ $shirt->name }}

  <form action="">{{-- priamary photo --}}</form>
  <form action="">{{-- photo1 --}}</form>
  <form action="">{{-- photo2 --}}</form>
  <form action="">{{-- photo3 --}}</form>
  <form action="">{{-- photo4 --}}</form>
  <form action="">{{-- photo5 --}}</form>


  <form wire:submit.prevent="editinfo" class="space-y-6 p-6 bg-base-100 rounded-lg shadow-md">
    <!-- Name -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Name</span>
        </label>
        <input type="text" wire:model="name" class="input input-bordered w-full" placeholder="Shirt Name" />
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Type -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Type</span>
        </label>
        <input type="text" wire:model="type" class="input input-bordered w-full" placeholder="Shirt Type" />
        @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Category -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Category</span>
        </label>
        <input type="text" wire:model="category" class="input input-bordered w-full" placeholder="Category" />
        @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Keywords -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Keywords</span>
        </label>
        <input type="text" wire:model="keywords" class="input input-bordered w-full" placeholder="Keywords" />
        @error('keywords') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Description -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Description</span>
        </label>
        <textarea wire:model="description" class="textarea textarea-bordered w-full" placeholder="Description"></textarea>
        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Price -->
    <div class="form-control w-full">
        <label class="label">
            <span class="label-text">Price</span>
        </label>
        <input type="number" wire:model="price" step="0.01" class="input input-bordered w-full" />
        @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>


    <button type="submit" class="btn btn-primary w-full mt-4">Save Changes</button>
</form>



</div>