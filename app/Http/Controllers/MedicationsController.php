<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Prescriber;
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
}
