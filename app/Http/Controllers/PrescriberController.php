<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Prescriber;
use App\Models\Pharmacy;
use App\Models\Medication;
use App\Models\User;

class PrescriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'prescribers' => auth()->user()->prescribers
        );
        return view('pages.prescriber.list', $data);
    }

    public function create()
    {
        return view('pages.prescriber.create');
    }

    public function store(Request $request)
    {
        $prescriber = new Prescriber();
        $prescriber->name = $request->input('name');
        $prescriber->address = $request->input('address');
        $prescriber->phone = $request->input('phone');
        $prescriber->city = $request->input('city');
        $prescriber->state = $request->input('state');
        $prescriber->zip = $request->input('zip');
        $prescriber->user_id = auth()->user()->id;
        $prescriber->save();

        // Set session message
        $request->session()->flash('status', 'Prescriber created successfully');

        return redirect('/dashboard/prescribers');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $prescriber = Prescriber::find($request->input('prescriber_id'));

        $prescriber->name = $request->input('name');
        $prescriber->address = $request->input('address');
        $prescriber->phone = $request->input('phone');
        $prescriber->city = $request->input('city');
        $prescriber->state = $request->input('state');
        $prescriber->zip = $request->input('zip');

        $prescriber->save();

        // Set session message
        $request->session()->flash('status', 'Prescriber updated successfully');

        return redirect('/dashboard/prescribers');
    }

    public function destroy(Request $request)
    {
        $prescriber = Prescriber::find($request->input('prescriber_id'));
        $prescriber->delete();

        // Set session message
        $request->session()->flash('status', 'Prescriber deleted successfully');

        return redirect('/dashboard/prescribers');
    }
}