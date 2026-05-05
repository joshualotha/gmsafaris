<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique();
            $table->string('safari_type')->nullable();
            $table->string('duration')->nullable();
            $table->string('travel_month')->nullable();
            $table->string('accommodation_level')->nullable();
            $table->integer('number_of_travelers')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->text('message')->nullable();
            $table->text('special_requests')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, cancelled, completed
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('currency')->default('USD');
            $table->text('admin_notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
