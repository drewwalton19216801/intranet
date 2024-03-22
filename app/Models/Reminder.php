<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\Medreminder;

class Reminder extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'medication_id',
        'time'
    ];



    public function notifyUser()
    {
        $this->userMedication->user->notify(new Medreminder());
    }
}
