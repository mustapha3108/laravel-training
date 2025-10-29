<?php

namespace App\Livewire;

use Illuminate\Support\Facades\{Auth, Storage};
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

    public function send_dispatch(){
        $this->dispatch("dis_test", message: "I'm BATMAN");
    }

    public function createtext(){
        Storage::disk('local')->put('example.txt', 'hello there crow');
        Storage::disk('public')->put('test/raven.txt', 'raven yo');
        return Storage::disk('public')->download('test/raven.txt');

        //return Storage::download('file.jpg', $name, $headers);
        //dd (asset('storage/test/raven.txt'));

    }

    public function render()
    {
        return view('livewire.counter');
    }
}
