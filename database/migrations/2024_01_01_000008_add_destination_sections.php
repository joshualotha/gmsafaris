<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            // Add new columns for destination sections
            $table->string('badge_text')->nullable()->after('subtitle');
            $table->string('category')->nullable()->after('location');
            $table->json('features')->nullable()->after('highlights');
            $table->json('wildlife_highlights')->nullable()->after('features');
            $table->json('activities')->nullable()->after('wildlife_highlights');
            $table->json('faq')->nullable()->after('activities');
            $table->string('cta_text')->nullable()->after('faq');
            $table->string('cta_url')->nullable()->after('cta_text');
            $table->string('map_embed_url')->nullable()->after('cta_url');
            $table->string('video_url')->nullable()->after('map_embed_url');
            $table->json('related_destinations')->nullable()->after('video_url');
        });
    }

    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn([
                'badge_text',
                'category',
                'features',
                'wildlife_highlights',
                'activities',
                'faq',
                'cta_text',
                'cta_url',
                'map_embed_url',
                'video_url',
                'related_destinations',
            ]);
        });
    }
};
