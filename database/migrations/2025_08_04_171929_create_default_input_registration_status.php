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
        Schema::create('default_input_registration_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->boolean('input_document')->default(false);
            $table->boolean('input_first_name')->default(true);
            $table->boolean('input_last_name')->default(true);
            $table->boolean('input_email')->default(true);
            $table->boolean('input_phone_number')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_input_registration_status');
    }
};
