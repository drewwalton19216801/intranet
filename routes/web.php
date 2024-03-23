<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedtrackerController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\PrescriberController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(MedtrackerController::class)->group(function () {
    Route::get('/medtracker', 'index')->name('medtracker.index');
    Route::get('/medtracker/reminders', 'reminders')->name('medtracker.reminders.index');
});

Route::controller(MedicationsController::class)->group(function () {
    Route::get('/medtracker/medications', 'index')->name('medtracker.medications.index');
    Route::get('/medtracker/medications/create', 'create')->name('medtracker.medications.create');
    Route::post('/medtracker/medications/save', 'store')->name('medtracker.medications.store');
    Route::post('/medtracker/medications/update/{id}', 'update')->name('medtracker.medications.update');
    Route::get('/medtracker/medications/saveaspdf', 'savePdf')->name('medtracker.medications.pdf');
    Route::get('/medtracker/medications/{id}', 'medication')->name('medtracker.medications.show');
    Route::get('/medtracker/medications/{id}/edit', 'editMedication')->name('medtracker.medications.edit');
    Route::get('/medtracker/medications/{id}/delete', 'destroy')->name('medtracker.medications.destroy');
});

Route::controller(PharmacyController::class)->group(function () {
    Route::get('/medtracker/pharmacies', 'index')->name('medtracker.pharmacies.index');
    Route::get('/medtracker/pharmacies/create', 'create')->name('medtracker.pharmacies.create');
    Route::post('/medtracker/pharmacies/store', 'store')->name('medtracker.pharmacies.store');
    Route::post('/medtracker/pharmacies/update/{id}', 'update')->name('medtracker.pharmacies.update');
    Route::get('/medtracker/pharmacies/{id}', 'pharmacy')->name('medtracker.pharmacies.show');
    Route::get('/medtracker/pharmacies/{id}/edit', 'editPharmacy')->name('medtracker.pharmacies.edit');
    Route::get('/medtracker/pharmacies/{id}/destroy', 'destroy')->name('medtracker.pharmacies.destroy');
});

Route::controller(PrescriberController::class)->group(function () {
    Route::get('/medtracker/prescribers', 'index')->name('medtracker.prescribers.index');
    Route::get('/medtracker/prescribers/create', 'create')->name('medtracker.prescribers.create');
    Route::post('/medtracker/prescribers/store', 'store')->name('medtracker.prescribers.store');
    Route::post('/medtracker/prescribers/update/{id}', 'update')->name('medtracker.prescribers.update');
    Route::get('/medtracker/prescribers/{id}', 'prescriber')->name('medtracker.prescribers.show');
    Route::get('/medtracker/prescribers/{id}/edit', 'editPrescriber')->name('medtracker.prescribers.edit');
    Route::get('/medtracker/prescribers/{id}/destroy', 'destroy')->name('medtracker.prescribers.destroy');
});
