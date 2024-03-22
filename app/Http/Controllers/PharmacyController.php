<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Prescriber;
use App\Models\Pharmacy;
use App\Models\Medication;
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
        return view('pages.pharmacy.list', $data);
    }

    public function create()
    {
        return view('pages.pharmacy.create');
    }

    public function store(Request $request)
    {
        $pharmacy = new Pharmacy();
        $pharmacy->name = $request->input('name');
        $pharmacy->address = $request->input('address');
        $pharmacy->phone = $request->input('phone');
        $pharmacy->email = $request->input('city');
        $pharmacy->state = $request->input('state');
        $pharmacy->zip = $request->input('zip');
        $pharmacy->user_id = auth()->user()->id;
        $pharmacy->save();
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

        return redirect('/dashboard/pharmacies');
    }

    public function destroy(Request $request)
    {
        $pharmacy = Pharmacy::find($request->input('pharmacy_id'));
        $pharmacy->delete();

        // Set session message
        $request->session()->flash('status', 'Pharmacy deleted successfully');

        return redirect('/dashboard/pharmacies');
    }
}
