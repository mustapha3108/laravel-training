<?php

namespace App\Livewire;

use App\Models\photo;
use Livewire\{Component, WithPagination};

class Browse extends Component
{

    use WithPagination;

    public $query, $sugquery, $suggestions;

    public function updatedQuery(){
        if($this->query == ""){
            $this->suggestions = collect();
        }else{
            $this->suggestions = photo::search($this->query)->take(4)->get();
            $this->suggestions = $this->suggestions->pluck('title')->toArray();
        }
        
    }


    public function mount(){
        if(request('query')){
            $this->query = request('query');
        }
    } 

    public function render()
    {
        return view('livewire.browse',[
            'results'=> photo::search($this->query)->paginate(8),
        ]);
    }
}
