<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\PrescriberController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/reminders', 'reminders')->name('reminders');
});

Route::controller(MedicationsController::class)->group(function () {
    Route::get('/dashboard/medications', 'index')->name('medications.index');
    Route::get('/dashboard/medications/create', 'createMedication')->name('medications.create');
    Route::post('/dashboard/medications/save', 'saveMedication')->name('medications.save');
    Route::post('/dashboard/medications/update/{id}', 'update')->name('medications.update');
    Route::get('/dashboard/medications/saveaspdf', 'saveMedicationList')->name('medications.pdf');
    Route::get('/dashboard/medications/{id}', 'medication')->name('medications.show');
    Route::get('/dashboard/medications/{id}/edit', 'editMedication')->name('medications.edit');
    Route::post('/dashboard/medications/{id}/delete', 'deleteMedication')->name('medications.delete');
});

Route::controller(PharmacyController::class)->group(function () {
    Route::get('/dashboard/pharmacies', 'index')->name('pharmacies.index');
    Route::get('/dashboard/pharmacies/create', 'create')->name('pharmacies.create');
    Route::post('/dashboard/pharmacies/save', 'savePharmacy')->name('pharmacies.save');
    Route::post('/dashboard/pharmacies/update/{id}', 'update')->name('pharmacies.update');
    Route::get('/dashboard/pharmacies/{id}', 'pharmacy')->name('pharmacies.show');
    Route::get('/dashboard/pharmacies/{id}/edit', 'editPharmacy')->name('pharmacies.edit');
    Route::post('/dashboard/pharmacies/{id}/delete', 'deletePharmacy')->name('pharmacies.delete');
});

Route::controller(PrescriberController::class)->group(function () {
    Route::get('/dashboard/prescribers', 'index')->name('prescribers.index');
    Route::get('/dashboard/prescribers/create', 'create')->name('prescribers.create');
    Route::post('/dashboard/prescribers/store', 'store')->name('prescribers.store');
    Route::post('/dashboard/prescribers/update/{id}', 'update')->name('prescribers.update');
    Route::get('/dashboard/prescribers/{id}', 'prescriber')->name('prescribers.show');
    Route::get('/dashboard/prescribers/{id}/edit', 'editPrescriber')->name('prescribers.edit');
    Route::post('/dashboard/prescribers/{id}/delete', 'deletePrescriber')->name('prescribers.delete');
});
