<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinSafariVehicle extends Model
{
    protected $fillable = [
        'join_safari_id',
        'vehicle_number',
        'capacity',
        'min_required',
        'status',
    ];

    protected $casts = [
        'vehicle_number' => 'integer',
        'capacity' => 'integer',
        'min_required' => 'integer',
    ];

    // ─── Relationships ─────────────────────────────────────────

    public function joinSafari()
    {
        return $this->belongsTo(JoinSafari::class);
    }

    // ─── Accessors (computed from parent distribution, NOT participant FK) ────

    /**
     * Seats filled is computed by distributing total confirmed people
     * across vehicles. No participant-to-vehicle assignment exists.
     * Pure math on loaded relations — no DB queries, no N+1 risk.
     */
    public function getSeatsFilledAttribute(): int
    {
        if (!$this->relationLoaded('joinSafari')) {
            $this->load('joinSafari');
        }
        return $this->joinSafari->computeVehicleDistribution()[$this->id] ?? 0;
    }

    public function getSeatsAvailableAttribute(): int
    {
        return max(0, $this->capacity - $this->seats_filled);
    }

    public function getIsFullAttribute(): bool
    {
        return $this->seats_available <= 0;
    }

    public function getMeetsMinimumAttribute(): bool
    {
        return $this->seats_filled >= $this->min_required;
    }

    // ─── Scopes ────────────────────────────────────────────────

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
