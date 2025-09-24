<?php

namespace App\Jobs;

use App\Mail\crowtest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\wuba;
use Illuminate\Support\Facades\Mail;

class Createwuba implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        wuba::create([
            'name'=>'delayed_class_queue',
            'kill_count'=>550
        ]);

        
    }
}
