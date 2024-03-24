<?php

namespace App\Http\Controllers\Medtracker;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Medtracker\Link;
use App\Models\Medtracker\Linkvisitor;
use App\Models\User;

class PublicLinkController extends Controller
{
    public function show($slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link === null) {
            abort(404);
        }

        if ($link->isTimedLink($slug) && Link::isExpired($slug)) {
            return view('pages.medtracker.publiclink.expired');
        }

        $link->last_clicked_at = now();
        $link->increment('clicks');

        $vistorIp = request()->ip();
        $visitorUserAgent = request()->header('User-Agent');
        $visitorReferer = request()->header('Referer');

        $link->linkvisitors()->create([
            'ip' => $vistorIp,
            'user_agent' => $visitorUserAgent,
            'referer' => $visitorReferer,
            'visited_at' => $link->last_clicked_at
        ]);

        $link->refresh();

        // Now that we know the link has been clicked, grab the medication list
        $medications = $link->user->medications()->get();

        $data = array(
            'link' => $link,
            'user' => $link->user,
            'medications' => $medications
        );

        return view('pages.medtracker.publiclink.show', $data);
    }
}
