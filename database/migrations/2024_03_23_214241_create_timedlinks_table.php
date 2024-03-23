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
        Schema::create('timedlinks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained();
            $table->timestamp('expires_at');
            $table->timestamp('last_clicked_at')->nullable();
            $table->integer('clicks')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timedlinks');
    }
};
