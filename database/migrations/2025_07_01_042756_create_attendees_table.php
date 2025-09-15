<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('email', 191)->nullable();
            $table->text('code')->nullable();
            $table->text('input_document')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Ensure unique attendee per event based on first name, last name, email, and phone number
            $table->unique(
                ['event_id', 'first_name', 'last_name', 'email', 'phone_number'],
                'unique_attendee_per_event'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendees');
    }
};
