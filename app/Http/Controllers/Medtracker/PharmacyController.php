<?php

namespace App\Http\Controllers\Medtracker;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Medtracker\Prescriber;
use App\Models\Medtracker\Pharmacy;
use App\Models\Medtracker\Medication;
use App\Models\User;

class PharmacyController extends Controller
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
            'pharmacies' => auth()->user()->pharmacies
        );
        return view('pages.medtracker.pharmacy.list', $data);
    }

    public function create()
    {
        return view('pages.medtracker.pharmacy.create');
    }

    public function store(Request $request)
    {
        $pharmacy = new Pharmacy();
        $pharmacy->name = $request->input('name');
        $pharmacy->address = $request->input('address');
        $pharmacy->phone = $request->input('phone');
        $pharmacy->city = $request->input('city');
        $pharmacy->state = $request->input('state');
        $pharmacy->zip = $request->input('zip');
        $pharmacy->user_id = auth()->user()->id;
        $pharmacy->save();

        // Set session message
        $request->session()->flash('status', 'Pharmacy created successfully');

        return redirect(route('medtracker.pharmacies.index'));
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

        $pharmacy = Pharmacy::find($request->input('pharmacy_id'));

        $pharmacy->name = $request->input('name');
        $pharmacy->address = $request->input('address');
        $pharmacy->phone = $request->input('phone');
        $pharmacy->city = $request->input('city');
        $pharmacy->state = $request->input('state');
        $pharmacy->zip = $request->input('zip');

        $pharmacy->save();

        // Set session message
        $request->session()->flash('status', 'Pharmacy updated successfully');

        return redirect(route('medtracker.pharmacies.index'));
    }

    public function destroy(Request $request, $pharmacy_id)
    {
        $pharmacy = Pharmacy::find($pharmacy_id);

        // Check if there are any medications associated with the pharmacy
        $medications = Medication::where('pharmacy_id', $pharmacy_id)->get();

        // If there are medications associated with the pharmacy, we cannot delete the pharmacy
        if (count($medications) > 0) {
            $request->session()->flash('error', 'Pharmacy cannot be deleted because there are medications associated with it');
            return redirect(route('medtracker.pharmacies.index'));
        }

        // Carry out deletion
        $pharmacy->delete();

        // Set session message
        $request->session()->flash('status', 'Pharmacy deleted successfully');

        return redirect(route('medtracker.pharmacies.index'));
    }
}
