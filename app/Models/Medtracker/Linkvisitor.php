<?php

namespace App\Models\Medtracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkvisitor extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'ip', 'user_agent', 'referer'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
