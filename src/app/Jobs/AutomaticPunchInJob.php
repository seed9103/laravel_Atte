<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TimeStamp;
use Carbon\Carbon;


class AutomaticPunchInJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        

        $lastPunchIn = TimeStamp::where('user_id', $user->id)
            ->whereNotNull('punch_in')
            ->whereNull('punch_out')
            ->latest()
            ->first();

            
        if (!$lastPunchIn ) {
            return;
        }
        if ($lastPunchIn->punch_in){
            return;
        }


        TimeStamp::create([
            'user_id' => $user->id,
            'punch_in' => now()
        ]);
    }
}
