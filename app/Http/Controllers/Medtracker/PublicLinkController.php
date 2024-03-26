<?php

namespace App\Http\Controllers\Medtracker;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Medtracker\Link;
use App\Models\Medtracker\Linkvisitor;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function download(Request $request, $slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link === null) {
            abort(404);
        }

        if ($link->isTimedLink($slug) && Link::isExpired($slug)) {
            return view('pages.medtracker.publiclink.expired');
        }

        $data = array(
            'medications' => $link->user->medications()->get(),
            'user' => $link->user,
            'date' => date('Y-m-d')
        );

        $pdf = Pdf::setPaper('letter', 'landscape')->loadView('pages.medtracker.medication.pdf', $data);

        $link->refresh();

        // Generate a unique filename
        $filename = 'medications-' . $link->user->name . '-' . date('Y-m-d') . '_' . time() . '.pdf';

        return $pdf->download($filename);
    }
}
