<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteImage extends Model
{
    protected $fillable = [
        'key',
        'filepath',
        'alt_text',
        'category',
    ];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('site_images'));
        static::deleted(fn () => Cache::forget('site_images'));
    }

    public function getUrlAttribute(): string
    {
        return asset($this->filepath);
    }

    public static function getByKey(string $key): ?self
    {
        return static::all()->keyBy('key')->get($key);
    }

    public static function getAllCached(): \Illuminate\Support\Collection
    {
        return Cache::rememberForever('site_images', fn () => static::all());
    }
}
