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

    public function participants()
    {
        return $this->hasMany(JoinSafariParticipant::class);
    }

    public function confirmedParticipants()
    {
        return $this->hasMany(JoinSafariParticipant::class)->where('is_confirmed', true);
    }

    // ─── Accessors ─────────────────────────────────────────────

    public function getSeatsFilledAttribute(): int
    {
        return (int) $this->confirmedParticipants()->sum('number_of_people');
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
