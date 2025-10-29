<?php

namespace App\Livewire;

use Laravel\Pail\Options;
use Livewire\{Component, WithFileUploads};
use Illuminate\Support\Facades\Storage;

class Phototest extends Component
{
    use WithFileUploads;
    public $email;
    public $password;
    public $photo;
    public $path;

    public function save(){

        $this->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
            'photo'=>['required', 'image']
        ]);

        $this->path = $this->photo->store(path: 'testing photos', options: 'public');
        
    }

    public function save2(){

        $this->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
            'photo'=>['required', 'image']
        ]);
        $this->path = Storage::disk('local')->put('testing photos private', $this->photo);
    }

    public function render()
    {
        return view('livewire.phototest');
    }
}
