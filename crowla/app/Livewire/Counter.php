<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class Counter extends Component
{

    public $count = 0;

    //protected $listeners = ['event-name'=> 'handle'];

    #[On('add')]
    public function handle($key)
    {
        $this->count = $this->count + $key;
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function resetc()
    {
        $this->count = 0;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
