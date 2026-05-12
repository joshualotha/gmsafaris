<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('join_safari_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('join_safari_id')->constrained()->cascadeOnDelete();
            $table->integer('vehicle_number');
            $table->integer('capacity')->default(7);
            $table->integer('min_required')->default(5);
            $table->string('status')->default('open'); // open, confirmed, cancelled
            $table->timestamps();

            $table->unique(['join_safari_id', 'vehicle_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_safari_vehicles');
    }
};
