<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/pharmacies', 'pharmacies')->name('pharmacies');
    Route::get('/dashboard/prescribers', 'prescribers')->name('prescribers');
    Route::get('/dashboard/medications', 'medications')->name('medications');
    Route::get('/dashboard/medications/{id}', 'medication')->name('medication');
    Route::get('/dashboard/medications/{id}/edit', 'editMedication')->name('medication.edit');
    Route::post('/dashboard/medications/{id}/delete', 'deleteMedication')->name('medication.delete');
    Route::get('/dashboard/reminders', 'reminders')->name('reminders');
});
