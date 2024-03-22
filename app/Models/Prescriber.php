<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriber extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
