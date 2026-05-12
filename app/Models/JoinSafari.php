<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JoinSafari extends Model
{
    protected $fillable = [
        'safari_id',
        'title',
        'slug',
        'description',
        'duration',
        'location',
        'start_date',
        'end_date',
        'max_participants',
        'min_participants',
        'price_per_person',
        'price_label',
        'hero_image',
        'highlights',
        'itinerary',
        'inclusions',
        'exclusions',
        'important_notes',
        'is_featured',
        'is_active',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'highlights' => 'array',
        'itinerary' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price_per_person' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($joinSafari) {
            if (empty($joinSafari->slug)) {
                $joinSafari->slug = Str::slug($joinSafari->title);
            }
        });
    }

    public function safari()
    {
        return $this->belongsTo(Safari::class);
    }

    public function participants()
    {
        return $this->hasMany(JoinSafariParticipant::class);
    }

    public function confirmedParticipants()
    {
        return $this->hasMany(JoinSafariParticipant::class)->where('is_confirmed', true);
    }

    public function vehicles()
    {
        return $this->hasMany(JoinSafariVehicle::class)->orderBy('vehicle_number');
    }

    public function openVehicles()
    {
        return $this->hasMany(JoinSafariVehicle::class)->where('status', 'open')->orderBy('vehicle_number');
    }

    /**
     * Total confirmed people (direct from participants, not vehicle FK).
     */
    public function getSpotsFilledAttribute(): int
    {
        return (int) $this->confirmedParticipants()->sum('number_of_people');
    }

    /**
     * Open seats across all open vehicles, minus spots already filled.
     */
    public function getSpotsRemainingAttribute(): int
    {
        $totalOpenCapacity = $this->vehicles
            ->where('status', 'open')
            ->sum('capacity');
        return max(0, $totalOpenCapacity - $this->spots_filled);
    }

    /**
     * Always joinable if active and open (vehicles auto-expand).
     */
    public function getIsJoinableAttribute(): bool
    {
        return $this->is_active && $this->status === 'open';
    }

    public function getTotalVehiclesAttribute(): int
    {
        return $this->vehicles->count();
    }

    public function getOpenVehiclesCountAttribute(): int
    {
        return $this->vehicles->where('status', 'open')->count();
    }

    /**
     * Distribute total confirmed people across vehicles for display.
     * Vehicles are NOT physical assignments — this is purely for visual
     * representation of how many seats are filled in each logical bucket.
     *
     * @return array<int, int>  [vehicle_id => computed_seats_filled]
     */
    public function computeVehicleDistribution(): array
    {
        $total = $this->spots_filled;
        $distribution = [];
        $remaining = $total;

        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->status === 'cancelled') {
                $distribution[$vehicle->id] = 0;
                continue;
            }
            $fill = min($remaining, $vehicle->capacity);
            $distribution[$vehicle->id] = $fill;
            $remaining -= $fill;
        }

        return $distribution;
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open')->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())->orderBy('start_date');
    }
}
