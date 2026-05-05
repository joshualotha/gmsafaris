<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'safari_id',
        'safari_type',
        'duration',
        'travel_month',
        'preferred_destinations',
        'accommodation_level',
        'accommodation_style',
        'number_of_travelers',
        'number_of_adults',
        'number_of_children',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'message',
        'special_requests',
        'hear_about_us',
        'status',
        'booking_type',
        'total_price',
        'currency',
        'admin_notes',
        'booking_data',
        'confirmed_at',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'confirmed_at' => 'datetime',
        'booking_data' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($booking) {
            if (empty($booking->booking_reference)) {
                $booking->booking_reference = 'BK-' . strtoupper(Str::random(8));
            }
        });
    }

    /**
     * Get the safari package associated with this booking.
     */
    public function safari()
    {
        return $this->belongsTo(Safari::class);
    }

    // ─── Scopes ────────────────────────────────────────────────────────

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope to only actual bookings (not inquiries stored in bookings table).
     */
    public function scopeBookings($query)
    {
        return $query->where('booking_type', 'booking');
    }

    /**
     * Scope to only inquiries stored in the bookings table.
     */
    public function scopeInquiries($query)
    {
        return $query->where('booking_type', 'inquiry');
    }

    // ─── Accessors ─────────────────────────────────────────────────────

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'confirmed' => 'success',
            'cancelled' => 'danger',
            'completed' => 'info',
            default => 'secondary',
        };
    }

    /**
     * Get the total number of travelers (adults + children).
     */
    public function getTotalTravelersAttribute(): int
    {
        return (int) $this->number_of_adults + (int) $this->number_of_children;
    }
}
