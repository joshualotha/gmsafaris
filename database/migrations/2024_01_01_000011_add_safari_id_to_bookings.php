<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Link booking to a specific safari package
            $table->foreignId('safari_id')->nullable()->constrained('safaris')->nullOnDelete()->after('id');

            // Booking type: 'booking' (multi-step) or 'inquiry' (simple inquiry)
            $table->string('booking_type')->default('booking')->after('status');

            // Detailed traveler breakdown
            $table->integer('number_of_adults')->nullable()->after('number_of_travelers');
            $table->integer('number_of_children')->nullable()->after('number_of_adults');

            // Trip preferences
            $table->string('preferred_destinations')->nullable()->after('travel_month');
            $table->string('accommodation_style')->nullable()->after('accommodation_level');

            // Marketing / referral source
            $table->string('hear_about_us')->nullable()->after('special_requests');

            // Full step-by-step booking data stored as JSON for audit
            $table->json('booking_data')->nullable()->after('admin_notes');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['safari_id']);
            $table->dropColumn([
                'safari_id',
                'booking_type',
                'number_of_adults',
                'number_of_children',
                'preferred_destinations',
                'accommodation_style',
                'hear_about_us',
                'booking_data',
            ]);
        });
    }
};
