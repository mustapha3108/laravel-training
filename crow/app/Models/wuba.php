<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wuba extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'kill_count'];

    public function lubas(){
        return $this->hasMany(luba::class);
    }
}
