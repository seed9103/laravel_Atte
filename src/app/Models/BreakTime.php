<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'break_start',
        'break_end',
        'break_time',
        ];

        public function timeStamp()
        {
            return $this->belongsTo(TimeStamp::class);
        }
}
