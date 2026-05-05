<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('join_safaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('safari_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title'); // e.g. "Serengeti Group Safari - June 2025"
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('duration')->nullable(); // e.g. "6 Days"
            $table->string('location')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('max_participants'); // total spots
            $table->integer('min_participants'); // minimum required for safari to run
            $table->decimal('price_per_person', 10, 2)->nullable();
            $table->string('price_label')->nullable(); // e.g. "From $1,200"
            $table->string('hero_image')->nullable();
            $table->json('highlights')->nullable();
            $table->json('itinerary')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->text('important_notes')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->enum('status', ['open', 'confirmed', 'cancelled', 'completed'])->default('open');
            // open = still accepting, confirmed = min met & locked, cancelled = min not met, completed = done
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('join_safari_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('join_safari_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->integer('number_of_people')->default(1); // how many spots they're booking
            $table->text('special_requests')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_safari_participants');
        Schema::dropIfExists('join_safaris');
    }
};
