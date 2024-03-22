<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'dosage', 'frequency', 'prescriber_id'];

    public function prescriber()
    {
        return $this->belongsTo(Prescriber::class);
    }

    public function userMedications()
    {
        return $this->hasMany(UserMedication::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'user_medications', 'medication_id', 'pharmacy_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_medications', 'medication_id', 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
