<?php

namespace App\Http\Controllers\Medtracker;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Medtracker\Link;
use App\Models\Medtracker\Timedlink;
use App\Models\Medtracker\Linkvisitor;
use App\Models\User;

class LinkController extends Controller
{
    public function index()
    {
        $data = array(
            'links' => auth()->user()->links
        );
        return view('pages.medtracker.link.list', $data);
    }

    public function create()
    {
        // Create a link for the user, and randomly generate a slug
        $link = new Link();
        $link->user_id = auth()->user()->id;
        $link->slug = Link::generateSlug();

        $link->save();

        // Redirect to the list
        return redirect()->route('medtracker.links.index');
    }

    public function show($slug)
    {
        $link = Link::where('slug', $slug)->first();
        $data = array(
            'link' => $link
        );
        return view('pages.medtracker.link.show', $data);
    }

    public function destroy(Request $request, $id)
    {
        $link = Link::find($id);
        $link->delete();
        return redirect()->route('medtracker.links.index')->with('status', 'Link deleted successfully');
    }
}
