<?php

namespace App\Models\Medtracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Prescriber extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'city', 'state', 'zip'];

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
