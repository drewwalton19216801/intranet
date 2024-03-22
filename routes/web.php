<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicationsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/pharmacies', 'pharmacies')->name('pharmacies');
    Route::get('/dashboard/prescribers', 'prescribers')->name('prescribers');
    Route::get('/dashboard/reminders', 'reminders')->name('reminders');

    Route::get('/dashboard/prescribers/{prescriber_id}', 'showPrescriber')->name('prescribers.show');
    Route::get('/dashboard/prescribers/{prescriber_id}/edit', 'editPrescriber')->name('prescriber.edit');
    Route::post('/dashboard/prescribers/{prescriber_id}/delete', 'deletePrescriber')->name('prescriber.delete');

    Route::get('/dashboard/pharmacies/{pharmacy_id}', 'showPharmacy')->name('pharmacies.show');
    Route::get('/dashboard/pharmacies/{pharmacy_id}/edit', 'editPharmacy')->name('pharmacy.edit');
    Route::post('/dashboard/pharmacies/{pharmacy_id}/delete', 'deletePharmacy')->name('pharmacy.delete');
});

Route::controller(MedicationsController::class)->group(function () {
    Route::get('/dashboard/medications', 'index')->name('medications.index');
    Route::get('/dashboard/medications/create', 'createMedication')->name('medications.create');
    Route::post('/dashboard/medications/save', 'saveMedication')->name('medications.save');
    Route::post('/dashboard/medications/update', 'updateMedication')->name('medications.update');
    Route::get('/dashboard/medications/saveaspdf', 'saveMedicationList')->name('medications.pdf');
    Route::get('/dashboard/medications/{id}', 'medication')->name('medications.show');
    Route::get('/dashboard/medications/{id}/edit', 'editMedication')->name('medications.edit');
    Route::post('/dashboard/medications/{id}/delete', 'deleteMedication')->name('medications.delete');
});
