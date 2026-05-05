<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('safaris', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('duration')->nullable(); // e.g. "6 Days"
            $table->string('location')->nullable(); // e.g. "Multi-Park"
            $table->string('type')->nullable(); // e.g. "Comprehensive"
            $table->string('category')->nullable(); // e.g. "featured", "standard"
            $table->decimal('price_from', 10, 2)->nullable();
            $table->string('price_label')->nullable(); // e.g. "From $2,500"
            $table->string('hero_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->json('highlights')->nullable();
            $table->json('itinerary')->nullable(); // structured day-by-day
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->json('faq')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('safaris');
    }
};
