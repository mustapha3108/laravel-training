<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class luba extends Model
{
    /** @use HasFactory<\Database\Factories\LubaFactory> */
    use HasFactory;
    public function wubas(){
        return $this->belongsTo(wuba::class, 'wuba_id');
    }
}
