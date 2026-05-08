<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use App\Models\Destination;
use App\Models\BlogPost;
use App\Models\JoinSafari;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    /**
     * Generate the XML sitemap for gmsafaris.co.tz.
     *
     * Includes all static pages, dynamic safari/destination/blog/join-safari entries,
     * and legacy redirect targets. Each URL includes <lastmod>, <changefreq>, and <priority>
     * to help search engines crawl efficiently.
     */
    public function index(): Response
    {
        $baseUrl = 'https://www.gmsafaris.co.tz';

        // ──────────────────────────────────────────────
        // 1. Static pages — defined as route name => [priority, changefreq]
        //    Ordered by importance (home first, then by site hierarchy)
        // ──────────────────────────────────────────────
        $staticPages = [
            'home'                    => ['1.0', 'daily'],
            'safaris'                 => ['0.9', 'daily'],
            'destinations'            => ['0.9', 'daily'],
            'blog'                    => ['0.8', 'daily'],
            'join-safari.index'       => ['0.8', 'weekly'],
            'about'                   => ['0.7', 'monthly'],
            'contact'                 => ['0.7', 'monthly'],
            'booking'                 => ['0.7', 'weekly'],
            'testimonial'             => ['0.7', 'monthly'],
            'gallery'                 => ['0.6', 'weekly'],
            'service'                 => ['0.6', 'monthly'],
            'tailoredsafaris'         => ['0.7', 'weekly'],
            'luxurysafari'            => ['0.7', 'weekly'],
            'mountaintrekking'        => ['0.7', 'weekly'],
            'groupsafaris'            => ['0.7', 'weekly'],
            'budgetsafari'            => ['0.7', 'weekly'],
            'zanzibarbeachholiday'    => ['0.7', 'weekly'],
            'besttimetovisit'         => ['0.6', 'monthly'],
            'localcustoms'            => ['0.5', 'monthly'],
            'healthandsafety'         => ['0.5', 'monthly'],
            'visa'                    => ['0.5', 'monthly'],
            'insurance'               => ['0.5', 'monthly'],
            'kilimanjaroroutes'       => ['0.6', 'monthly'],
            'package-details'         => ['0.5', 'monthly'],
            'privacypolicy'           => ['0.3', 'yearly'],
            'termsandconditions'      => ['0.3', 'yearly'],
        ];

        // ──────────────────────────────────────────────
        // 2. Dynamic content — query active/published records
        // ──────────────────────────────────────────────
        $safaris = Safari::active()->ordered()->get(['slug', 'updated_at']);
        $destinations = Destination::active()->ordered()->get(['slug', 'updated_at']);
        $blogPosts = BlogPost::published()->recent()->get(['slug', 'updated_at', 'published_at']);
        $joinSafaris = JoinSafari::open()->upcoming()->get(['slug', 'updated_at']);

        // ──────────────────────────────────────────────
        // 3. Build XML
        // ──────────────────────────────────────────────
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Static pages
        foreach ($staticPages as $routeName => [$priority, $changefreq]) {
            $url = $baseUrl;

            // Home route is '/', others need a leading slash
            if ($routeName !== 'home') {
                try {
                    $path = route($routeName, [], false);
                    $url .= $path;
                } catch (\Exception $e) {
                    // Fallback: derive path from route name
                    $url .= '/' . str_replace(['.', 'index'], ['/', ''], $routeName);
                }
            }

            $xml .= $this->urlElement($url, now()->toIso8601String(), $changefreq, $priority);
        }

        // Safari detail pages
        foreach ($safaris as $safari) {
            $url = $baseUrl . '/safari/' . $safari->slug;
            $lastmod = $safari->updated_at->toIso8601String();
            $xml .= $this->urlElement($url, $lastmod, 'weekly', '0.8');
        }

        // Destination detail pages
        foreach ($destinations as $destination) {
            $url = $baseUrl . '/destination/' . $destination->slug;
            $lastmod = $destination->updated_at->toIso8601String();
            $xml .= $this->urlElement($url, $lastmod, 'weekly', '0.8');
        }

        // Blog detail pages
        foreach ($blogPosts as $post) {
            $url = $baseUrl . '/blog/' . $post->slug;
            $lastmod = ($post->updated_at ?? $post->published_at)->toIso8601String();
            $xml .= $this->urlElement($url, $lastmod, 'monthly', '0.6');
        }

        // Join Safari detail pages
        foreach ($joinSafaris as $joinSafari) {
            $url = $baseUrl . '/join-safari/' . $joinSafari->slug;
            $lastmod = $joinSafari->updated_at->toIso8601String();
            $xml .= $this->urlElement($url, $lastmod, 'weekly', '0.7');
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Build a single <url> element.
     */
    private function urlElement(string $loc, string $lastmod, string $changefreq, string $priority): string
    {
        $escapedLoc = htmlspecialchars($loc, ENT_XML1, 'UTF-8');
        return "  <url>\n" .
               "    <loc>{$escapedLoc}</loc>\n" .
               "    <lastmod>{$lastmod}</lastmod>\n" .
               "    <changefreq>{$changefreq}</changefreq>\n" .
               "    <priority>{$priority}</priority>\n" .
               "  </url>\n";
    }
}
