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
        Schema::create('qr_code_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained('qr_codes')->cascadeOnDelete()->nullable();
            $table->foreignId('attendee_id')->constrained('attendees')->cascadeOnDelete()->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->nullable();
            $table->enum('status', [
                'Not Scanned',
                'Scanned',
                'Invalid'
            ]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code_logs');
    }
};
