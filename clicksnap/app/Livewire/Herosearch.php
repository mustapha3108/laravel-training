<?php

namespace App\Livewire;

use App\Models\photo;
use Livewire\Component;

class Herosearch extends Component
{

    public $res;
    public $query;

    public function search(){
        //dd('works');
        //$res = photo::search($query)->paginate(10);
        
        $this->redirectRoute('browse', ['query'=>$this->query]);
        #search with meilisearch
        #redirect to browse page
    }

    public function render()
    {
        return view('livewire.herosearch');
    }
}
