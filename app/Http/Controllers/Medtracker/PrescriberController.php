<?php

namespace App\Http\Controllers\Medtracker;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Medtracker\Prescriber;
use App\Models\Medtracker\Pharmacy;
use App\Models\Medtracker\Medication;
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
        return view('pages.medtracker.prescriber.list', $data);
    }

    public function create()
    {
        return view('pages.medtracker.prescriber.create');
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

        return redirect(route('medtracker.prescribers.index'));
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

        return redirect(route('medtracker.prescribers.index'));
    }

    public function destroy(Request $request, $prescriber_id)
    {
        $prescriber = Prescriber::find($prescriber_id);

        // Check if there are any medications associated with the prescriber
        $medications = Medication::where('prescriber_id', $prescriber_id)->get();

        // If there are medications associated with the prescriber, we cannot delete the prescriber
        if (count($medications) > 0) {
            $request->session()->flash('error', 'Prescriber cannot be deleted because there are medications associated with it');
            return redirect(route('medtracker.prescribers.index'));
        }

        $prescriber->delete();

        // Set session message
        $request->session()->flash('status', 'Prescriber deleted successfully');

        return redirect(route('medtracker.prescribers.index'));
    }
}
