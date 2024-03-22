<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Prescriber;

class DashboardController extends Controller
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
        return view('dashboard');
    }

    public function pharmacies()
    {
        return view('pages.pharmacy.list');
    }

    public function prescribers()
    {
        return view('pages.prescriber.list');
    }

    public function showPrescriber($id)
    {
        $data = array(
            'prescriber' => Prescriber::find($id)
        );
        return view('pages.prescriber.show', $data);
    }

    public function showPharmacy($id)
    {
        $data = array(
            'pharmacy' => auth()->user()->pharmacy
        );
        return view('pages.pharmacy.show', $data);
    }

    public function reminders()
    {
        return view('pages.reminder.list');
    }
}
