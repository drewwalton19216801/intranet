<?php

namespace App\Models\Medtracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'user_id'];

    public function timedlinks()
    {
        return $this->hasMany(Timedlink::class);
    }

    public function linkvisitors()
    {
        return $this->hasMany(Linkvisitor::class);
    }
}
