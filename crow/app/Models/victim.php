<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\serialkiller;

class victim extends Model
{
    /** @use HasFactory<\Database\Factories\VictimFactory> */
    use HasFactory;
    protected $table = 'victims';
    protected $guarded = [];
    public function serialkillers(){
        return $this->belongsTo(serialkiller::class, 'killer');
    }
}
