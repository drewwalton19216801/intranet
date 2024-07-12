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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // Time user got into bed
            $table->time('time_in');
            // Time user tried to sleep
            $table->time('time_sleep');
            // How long it took to fall asleep
            $table->time('time_to_sleep');
            // How many times user woke up
            $table->integer('wakeup_count');
            // How long did the awakenings last in total
            $table->time('time_awake');
            // Time of final awakening
            $table->time('time_final_awake');
            // Time user got out of bed
            $table->time('time_out');
            // Quality rating of sleep
            $table->integer('quality');
            // Any comments
            $table->text('comments');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
