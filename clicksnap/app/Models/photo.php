<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class photo extends Model
{
    use Searchable;


    protected $guarded=[];


    public function toSearchableArray(): array
    {
        $array = $this->toArray();
        return $array;
    }
    
}
