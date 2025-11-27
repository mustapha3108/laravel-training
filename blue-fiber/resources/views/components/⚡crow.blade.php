<?php

use Livewire\Component;

new class extends Component
{
    public $crow = 5;

    public function newcrow(){
        $this->crow++;
    }
};
?>

<div class="btn btn-accent flex flex-row-reverse justify-center items-center" wire:ignore>
    {{-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin --}}
    <h1 x-text="$wire.crow"></h1>
    <button  @click="$wire.newcrow()">click me</button>
</div>