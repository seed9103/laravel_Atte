<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeStamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'punch_in', 
        'punch_out',
        'total_work',
        'total_break', 
         ];

        public function breaks()
        {
            return $this->hasMany(BreakTime::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

}