<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Prescriber;
use App\Models\Pharmacy;
use App\Models\Medication;
use Barryvdh\DomPDF\Facade\Pdf;

class MedicationsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the medications for the current user
        $data = array(
            'medications' => auth()->user()->medications,
            'prescribers' => auth()->user()->prescribers,
            'pharmacies' => auth()->user()->pharmacies
        );
        return view('pages.medtracker.medication.list', $data);
    }

    public function savePdf()
    {
        // Get the medications for the current user
        $medications = auth()->user()->medications()->get();

        $data = array(
            'medications' => $medications,
            'user' => auth()->user(),
            'date' => date('Y-m-d')
        );
        $pdf = Pdf::setPaper('letter', 'landscape')->loadView('pages.medtracker.medication.pdf', $data);

        // Generate a unique filename
        $filename = 'medications-' . auth()->user()->name . '-' . date('Y-m-d') . '_' . time() . '.pdf';

        return $pdf->download($filename);
    }

    public function create(Request $request)
    {
        $data = array(
            'pharmacies' => auth()->user()->pharmacies,
            'prescribers' => auth()->user()->prescribers
        );
        return view('pages.medtracker.medication.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'dosage' => 'required',
            'frequency' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $medication = new Medication();
        $medication->name = $request->name;
        $medication->description = $request->description;
        $medication->dosage = $request->dosage;
        $medication->frequency = $request->frequency;
        $medication->start_date = $request->start_date;
        $medication->end_date = $request->end_date;

        $medication->user_id = auth()->user()->id;
        $medication->prescriber_id = $request->prescriber_id;
        $medication->pharmacy_id = $request->pharmacy_id;

        $medication->save();

        // Set session status message
        $request->session()->flash('status', 'Medication created successfully');

        return redirect(route('medtracker.medications.index'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'dosage' => 'required',
            'frequency' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        $medication = Medication::find($request->medication_id);

        $medication->name = $request->name;
        $medication->description = $request->description;
        $medication->dosage = $request->dosage;
        $medication->frequency = $request->frequency;
        $medication->start_date = $request->start_date;
        $medication->end_date = $request->end_date;

        $medication->prescriber_id = $request->prescriber_id;
        $medication->pharmacy_id = $request->pharmacy_id;

        $medication->save();

        // Set session status message
        $request->session()->flash('status', 'Medication updated successfully');

        return redirect(route('medtracker.medications.index'));
    }

    public function destroy(Request $request, $medication_id)
    {
        $medication = Medication::find($medication_id);
        $medication->delete();

        // Set session status message
        $request->session()->flash('status', 'Medication deleted successfully');

        return redirect(route('medtracker.medications.index'));
    }
}
