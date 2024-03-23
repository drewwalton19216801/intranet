<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedtrackerController;
use App\Http\Controllers\Medtracker\MedicationsController;
use App\Http\Controllers\Medtracker\PharmacyController;
use App\Http\Controllers\Medtracker\PrescriberController;
use App\Http\Controllers\Medtracker\LinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('dashboard')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
    Route::get('/logout', 'logout')->name('dashboard.logout');
});

Route::prefix('dashboard/profile')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'profile')->name('dashboard.profile');
    Route::post('/update', 'update')->name('dashboard.profile.update');
    Route::post('/change-password', 'storePassword')->name('dashboard.profile.password.store');
    Route::get('/change-password', 'changePassword')->name('dashboard.profile.password.change');
});

Route::prefix('medtracker')->controller(MedtrackerController::class)->group(function () {
    Route::get('/', 'index')->name('medtracker.index');
    Route::get('/reminders', 'reminders')->name('medtracker.reminders.index');
});

Route::prefix('medtracker/medications')->controller(MedicationsController::class)->group(function () {
    Route::get('/', 'index')->name('medtracker.medications.index');
    Route::get('/create', 'create')->name('medtracker.medications.create');
    Route::post('/store', 'store')->name('medtracker.medications.store');
    Route::post('/{id}/update', 'update')->name('medtracker.medications.update');
    Route::get('/saveaspdf', 'savePdf')->name('medtracker.medications.pdf');
    Route::get('/{id}', 'medication')->name('medtracker.medications.show');
    Route::get('/{id}/edit', 'editMedication')->name('medtracker.medications.edit');
    Route::get('/{id}/delete', 'destroy')->name('medtracker.medications.destroy');
});

Route::prefix('medtracker/pharmacies')->controller(PharmacyController::class)->group(function () {
    Route::get('/', 'index')->name('medtracker.pharmacies.index');
    Route::get('/create', 'create')->name('medtracker.pharmacies.create');
    Route::post('/store', 'store')->name('medtracker.pharmacies.store');
    Route::post('/{id}/update', 'update')->name('medtracker.pharmacies.update');
    Route::get('/{id}', 'pharmacy')->name('medtracker.pharmacies.show');
    Route::get('/{id}/edit', 'editPharmacy')->name('medtracker.pharmacies.edit');
    Route::get('/{id}/delete', 'destroy')->name('medtracker.pharmacies.destroy');
});

Route::prefix('medtracker/prescribers')->controller(PrescriberController::class)->group(function () {
    Route::get('/', 'index')->name('medtracker.prescribers.index');
    Route::get('/create', 'create')->name('medtracker.prescribers.create');
    Route::post('/store', 'store')->name('medtracker.prescribers.store');
    Route::post('/{id}/update', 'update')->name('medtracker.prescribers.update');
    Route::get('/{id}', 'prescriber')->name('medtracker.prescribers.show');
    Route::get('/{id}/edit', 'editPrescriber')->name('medtracker.prescribers.edit');
    Route::get('/{id}/delete', 'destroy')->name('medtracker.prescribers.destroy');
});

Route::prefix('medtracker/links')->controller(LinkController::class)->group(function () {
    Route::get('/', 'index')->name('medtracker.links.index');
    Route::get('/create', 'create')->name('medtracker.links.create');
    Route::post('/store', 'store')->name('medtracker.links.store');
    Route::get('/{id}/edit', 'editLink')->name('medtracker.links.edit');
    Route::post('/{id}/update', 'updateLink')->name('medtracker.links.update');
    Route::get('/{id}/delete', 'destroy')->name('medtracker.links.destroy');
});
