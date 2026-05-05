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

    public function getSpotsFilledAttribute()
    {
        return $this->confirmedParticipants()->sum('number_of_people');
    }

    public function getSpotsRemainingAttribute()
    {
        return $this->max_participants - $this->spots_filled;
    }

    public function getIsJoinableAttribute()
    {
        return $this->is_active && $this->status === 'open' && $this->spots_remaining > 0;
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
