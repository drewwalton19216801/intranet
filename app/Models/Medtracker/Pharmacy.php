<?php

namespace App\Models\Medtracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'city', 'state', 'zip', 'user_id'];
}
