<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'images',
        'author',
        'category',
        'tags',
        'reading_time',
        'is_published',
        'is_featured',
        'is_trending',
        'related_post_ids',
        'published_at',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'images' => 'array',
        'tags' => 'array',
        'related_post_ids' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Resolve a featured image URL, returning null if empty.
     */
    public static function resolveImageUrl(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }
        // If it's already a full URL, return as-is
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        // Otherwise, use Storage::url() to generate the correct URL via the public disk symlink
        return \Illuminate\Support\Facades\Storage::disk('public')->url($path);
    }

    /**
     * Resolve gallery images array, filtering empties and prefixing URLs.
     */
    public static function resolveGalleryImages(?array $images): array
    {
        if (empty($images)) {
            return [];
        }
        return array_values(array_filter(array_map(function ($img) {
            if (empty($img)) {
                return null;
            }
            if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
                return $img;
            }
            return \Illuminate\Support\Facades\Storage::disk('public')->url($img);
        }, $images)));
    }

    /**
     * Get the hero/featured image URL attribute.
     */
    public function getHeroImageUrlAttribute(): ?string
    {
        return static::resolveImageUrl($this->featured_image);
    }

    /**
     * Get the thumbnail image URL attribute.
     */
    public function getThumbnailImageUrlAttribute(): ?string
    {
        // Use featured_image as thumbnail if no separate thumbnail
        return static::resolveImageUrl($this->featured_image);
    }

    /**
     * Get the related posts.
     */
    public function relatedPosts()
    {
        $ids = $this->related_post_ids;

        // Handle case where the value is still a JSON string (cast may not apply)
        if (is_string($ids)) {
            $ids = json_decode($ids, true) ?? [];
        }

        if (empty($ids) || !is_array($ids)) {
            return collect();
        }

        return self::whereIn('id', $ids)->get();
    }
}
