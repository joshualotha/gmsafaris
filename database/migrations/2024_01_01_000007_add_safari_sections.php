<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->string('badge_text')->nullable()->after('category');
            $table->json('pricing_tiers')->nullable()->after('price_label');
            $table->json('important_notes')->nullable()->after('faq');
        });
    }

    public function down(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->dropColumn(['badge_text', 'pricing_tiers', 'important_notes']);
        });
    }
};
