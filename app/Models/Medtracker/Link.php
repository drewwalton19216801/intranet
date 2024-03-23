<?php

namespace App\Models\Medtracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'description', 'expires_at', 'last_clicked_at', 'clicks', 'user_id'];

    public function linkvisitors()
    {
        return $this->hasMany(Linkvisitor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateSlug()
    {
        $slug = bin2hex(random_bytes(10));
        return $slug;
    }

    public static function isTimedLink($slug)
    {
        $link = Link::where('slug', $slug)->first();
        if ($link->expires_at == null) {
            return false;
        } else {
            return true;
        }
    }
}
