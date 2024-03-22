<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medication_id',
        'prescriber_id',
        'pharmacy_id',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function prescriber()
    {
        return $this->belongsTo(Prescriber::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    // Date helper functions
    public function getDaysRemainingAttribute()
    {
        $now = now();
        $end_date = $this->end_date;
        $days = $now->diffInDays($end_date);
        return $days;
    }
}
