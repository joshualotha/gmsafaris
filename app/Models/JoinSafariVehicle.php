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
