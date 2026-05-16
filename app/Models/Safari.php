<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Safari extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'short_description',
        'description',
        'duration',
        'location',
        'type',
        'category',
        'badge_text',
        'price_from',
        'price_label',
        'pricing_tiers',
        'hero_image',
        'thumbnail_image',
        'gallery_images',
        'highlights',
        'itinerary',
        'inclusions',
        'exclusions',
        'faq',
        'important_notes',
        'is_featured',
        'is_active',
        'is_published',
        'published_at',
        'sort_order',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'highlights' => 'array',
        'itinerary' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'faq' => 'array',
        'important_notes' => 'array',
        'pricing_tiers' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'price_from' => 'decimal:2',
    ];

    protected $appends = [
        'hero_image_url',
        'thumbnail_image_url',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($safari) {
            if (empty($safari->slug)) {
                $safari->slug = Str::slug($safari->title);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Resolve an image path to its public URL.
     * Handles both seeder paths (img/...) and admin-uploaded paths (safaris/...).
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
        // Paths starting with 'safaris/' are in storage/app/public/safaris/ — use Storage::url()
        if (str_starts_with($path, 'safaris/')) {
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
