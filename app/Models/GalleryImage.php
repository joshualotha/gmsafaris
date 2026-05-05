<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'caption',
        'alt_text',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the full URL for the gallery image.
     */
    public function getFullUrlAttribute(): string
    {
        return asset('img/gallery/full/' . $this->filename);
    }

    /**
     * Get the thumbnail URL for the gallery image.
     */
    public function getThumbUrlAttribute(): string
    {
        return asset('img/gallery/thumb/' . $this->filename);
    }

    /**
     * Scope active (visible) images.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope ordered by sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope by category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
