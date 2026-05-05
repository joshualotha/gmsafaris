<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'badge_text',
        'short_description',
        'description',
        'hero_image',
        'thumbnail_image',
        'gallery_images',
        'highlights',
        'features',
        'quick_facts',
        'location',
        'category',
        'best_time_to_visit',
        'key_attractions',
        'wildlife_highlights',
        'activities',
        'faq',
        'cta_text',
        'cta_url',
        'map_embed_url',
        'video_url',
        'related_destinations',
        'is_active',
        'sort_order',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'highlights' => 'array',
        'features' => 'array',
        'quick_facts' => 'array',
        'best_time_to_visit' => 'array',
        'wildlife_highlights' => 'array',
        'activities' => 'array',
        'faq' => 'array',
        'related_destinations' => 'array',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'hero_image_url',
        'thumbnail_image_url',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = Str::slug($destination->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Resolve an image path to its public URL.
     * Handles both seeder paths (img/...) and admin-uploaded paths (destinations/...).
     */
    public static function resolveImageUrl(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }
        // Paths starting with 'img/' are in public/img/ — use asset() directly
        if (str_starts_with($path, 'img/')) {
            return asset($path);
        }
        // Paths starting with 'destinations/' are in storage/app/public/destinations/ — use Storage::url()
        if (str_starts_with($path, 'destinations/')) {
            return Storage::url($path);
        }
        // Fallback
        return asset($path);
    }

    /**
     * Resolve gallery image items to their public URLs.
     * Handles both array format (full/thumb/caption/alt) and plain string paths.
     */
    public static function resolveGalleryImages(?array $images): array
    {
        if (empty($images)) {
            return [];
        }
        return array_map(function ($item) {
            if (is_string($item)) {
                return self::resolveImageUrl($item);
            }
            if (is_array($item)) {
                $resolved = $item;
                if (isset($item['full'])) {
                    $resolved['full'] = self::resolveImageUrl($item['full']);
                }
                if (isset($item['thumb'])) {
                    $resolved['thumb'] = self::resolveImageUrl($item['thumb']);
                }
                return $resolved;
            }
            return $item;
        }, $images);
    }

    /**
     * Accessor for hero_image_url
     */
    public function getHeroImageUrlAttribute(): ?string
    {
        return self::resolveImageUrl($this->hero_image);
    }

    /**
     * Accessor for thumbnail_image_url
     */
    public function getThumbnailImageUrlAttribute(): ?string
    {
        return self::resolveImageUrl($this->thumbnail_image);
    }
}
