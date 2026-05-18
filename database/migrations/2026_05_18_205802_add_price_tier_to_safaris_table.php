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
        Schema::table('safaris', function (Blueprint $table) {
            $table->string('price_tier', 50)->nullable()->after('price_label');
        });
    }

    public function down(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->dropColumn('price_tier');
        });
    }
};
