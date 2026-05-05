<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->integer('reading_time')->nullable()->after('content')->comment('Estimated reading time in minutes');
            $table->boolean('is_featured')->default(false)->after('is_published');
            $table->boolean('is_trending')->default(false)->after('is_featured');
            $table->json('related_post_ids')->nullable()->after('is_trending')->comment('Array of related blog post IDs');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn(['reading_time', 'is_featured', 'is_trending', 'related_post_ids']);
        });
    }
};
