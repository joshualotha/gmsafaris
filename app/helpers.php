<?php

use App\Models\SiteImage;

if (!function_exists('site_image')) {
    function site_image(string $key, ?string $default = null): string
    {
        $images = SiteImage::getAllCached();
        $image = $images->firstWhere('key', $key);

        if ($image) {
            return $image->url;
        }

        return $default ? asset($default) : '';
    }
}

if (!function_exists('site_image_attr')) {
    function site_image_attr(string $key, string $attr = 'alt_text', string $default = ''): string
    {
        $images = SiteImage::getAllCached();
        $image = $images->firstWhere('key', $key);

        if ($image && $image->{$attr}) {
            return $image->{$attr};
        }

        return $default;
    }
}

if (!function_exists('site_image_filepath')) {
    function site_image_filepath(string $key, ?string $default = null): ?string
    {
        $images = SiteImage::getAllCached();
        $image = $images->firstWhere('key', $key);

        return $image ? $image->filepath : $default;
    }
}
