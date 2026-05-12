<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('join_safari_participants', function (Blueprint $table) {
            $table->foreignId('join_safari_vehicle_id')
                  ->nullable()
                  ->after('join_safari_id')
                  ->constrained('join_safari_vehicles')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('join_safari_participants', function (Blueprint $table) {
            $table->dropForeign(['join_safari_vehicle_id']);
            $table->dropColumn('join_safari_vehicle_id');
        });
    }
};
