<?php
/**
 * Update related_post_ids across all blog posts
 * to include the new Phase 3 pillar pages (IDs 11, 12, 13)
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\BlogPost;

// Define related posts for each post (excluding self-references)
$relations = [
    // Post 1: Great Migration - link to Serengeti Migration (8), Tanzania Travel (13), Best Time (6)
    1 => [6, 8, 13],
    
    // Post 2: Kilimanjaro Preparation - link to Kilimanjaro Pillar (11), Tanzania Travel (13), Best Time (6)
    2 => [6, 11, 13],
    
    // Post 3: Wildlife Photography - link to Tanzania Travel (13), Serengeti Migration (8), Best Time (6)
    3 => [6, 8, 13],
    
    // Post 4: Zanzibar Culture - link to Zanzibar Pillar (12), Tanzania Travel (13), Best Time (6)
    4 => [6, 12, 13],
    
    // Post 6: Best Time to Visit - link to Tanzania Travel (13), Serengeti Migration (8), Kilimanjaro (11), Zanzibar (12)
    6 => [8, 11, 12, 13],
    
    // Post 7: Safari Cost - link to Tanzania Travel (13), Kilimanjaro (11), Zanzibar (12), Choose Operator (9)
    7 => [9, 11, 12, 13],
    
    // Post 8: Serengeti Migration - link to Best Time (6), Tanzania Travel (13), Choose Operator (9)
    8 => [6, 9, 13],
    
    // Post 9: Choose Operator - link to Tanzania Travel (13), Safari Cost (7), About page context
    9 => [7, 13],
    
    // Post 10: UK Guide - link to Tanzania Travel (13), Safari Cost (7), Best Time (6)
    10 => [6, 7, 13],
    
    // Post 11: Kilimanjaro Pillar - link to Kilimanjaro Prep (2), Best Time (6), Safari Cost (7), Tanzania Travel (13)
    11 => [2, 6, 7, 13],
    
    // Post 12: Zanzibar Pillar - link to Zanzibar Culture (4), Best Time (6), Safari Cost (7), Serengeti Migration (8)
    12 => [4, 6, 7, 8],
    
    // Post 13: Tanzania Travel Pillar - link to Best Time (6), Safari Cost (7), Serengeti Migration (8), Choose Operator (9), UK Guide (10)
    13 => [6, 7, 8, 9, 10],
];

foreach ($relations as $postId => $relatedIds) {
    $post = BlogPost::find($postId);
    if ($post) {
        $post->related_post_ids = $relatedIds;
        $post->save();
        echo "Updated Post {$postId}: {$post->title} -> related_post_ids: [" . implode(',', $relatedIds) . "]\n";
    } else {
        echo "WARNING: Post {$postId} not found!\n";
    }
}

echo "\n=== All related_post_ids updated successfully ===\n";
