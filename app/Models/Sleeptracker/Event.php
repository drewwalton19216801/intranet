<?php

namespace App\Models\Sleeptracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['time_in', 'time_sleep', 'time_to_sleep', 'wakeup_count', 'time_awake', 'time_final_awake', 'time_out', 'quality', 'comments', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
