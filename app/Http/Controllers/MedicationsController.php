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
            'medications' => auth()->user()->medications
        );
        return view('pages.medication.list', $data);
    }

    public function saveMedicationList()
    {
        // Get the medications for the current user if they are not expired (e.g. today is not past end_date)
        $medications = auth()->user()->medications()->whereDate('end_date', '>=', date('Y-m-d'))->get();

        $data = array(
            'medications' => $medications,
            'user' => auth()->user(),
            'date' => date('Y-m-d')
        );
        $pdf = Pdf::setPaper('letter', 'landscape')->loadView('pages.medication.pdf', $data);

        // Generate a unique filename
        $filename = 'medications-' . auth()->user()->name . '-' . date('Y-m-d') . '_' . time() . '.pdf';

        return $pdf->download($filename);
    }

    public function create(Request $request)
    {
        return view('pages.medication.create');
    }

    public function saveNew(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
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

        $medication->save();

        // Set session status message
        $request->session()->flash('status', 'Medication updated successfully');

        return redirect('/dashboard/medications');
    }
}
