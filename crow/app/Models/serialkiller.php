<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class serialkiller extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\SerialkillersFactory> */
    use HasFactory;
    protected $table = 'serialkillers';
    protected $fillable = ['killer_name', 'kill_count'];
    public function victims(){
        return $this->hasMany(victim::class, 'killer');
    }

}
