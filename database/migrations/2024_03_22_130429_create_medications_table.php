<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('dosage');
            $table->string('frequency');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('prescriber_id')->constrained('prescribers');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('pharmacy_id')->constrained('pharmacies');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications');
    }
};
