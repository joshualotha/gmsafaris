<?php
/**
 * Update related_post_ids across all posts to include new Phase 4 posts
 */
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
use App\Models\BlogPost;

$updates = [
    // Post 1: Best Time to See Great Migration
    1 => [2, 3, 6, 7, 8, 11, 13, 14, 15, 16, 17],
    // Post 2: Preparing for Kilimanjaro Trek
    2 => [1, 3, 11, 13, 14, 16, 17],
    // Post 3: Wildlife Photography Tips
    3 => [1, 2, 6, 8, 14, 15],
    // Post 4: Zanzibar More Than Just Beaches
    4 => [6, 7, 12, 13, 14, 17],
    // Post 6: Best Time to Visit Tanzania
    6 => [1, 7, 8, 11, 13, 14, 15, 16, 17],
    // Post 7: Tanzania Safari Cost
    7 => [1, 6, 9, 13, 14, 15, 17],
    // Post 8: Serengeti Wildebeest Migration
    8 => [1, 6, 11, 13, 15, 16],
    // Post 9: How to Choose a Tanzania Safari Operator
    9 => [6, 7, 10, 13, 14, 17],
    // Post 10: Tanzania Safari from UK
    10 => [9, 13, 14, 17],
    // Post 11: Kilimanjaro Climbing Guide (Pillar)
    11 => [1, 2, 6, 7, 8, 12, 13, 14, 15, 16, 17],
    // Post 12: Zanzibar Travel Guide (Pillar)
    12 => [1, 2, 3, 4, 6, 8, 11, 13, 14, 15, 17],
    // Post 13: Tanzania Travel Guide (Pillar)
    13 => [1, 2, 3, 4, 6, 7, 8, 9, 10, 11, 12, 14, 15, 16, 17],
    // Post 14: What to Pack for Tanzania Safari (NEW)
    14 => [6, 7, 9, 13, 15, 16, 17],
    // Post 15: Best Time to Visit Serengeti (NEW)
    15 => [6, 8, 11, 13, 14, 16],
    // Post 16: Best Time to Climb Kilimanjaro (NEW)
    16 => [2, 11, 13, 14, 15, 17],
    // Post 17: Tanzania Visa Requirements (NEW)
    17 => [10, 13, 14, 16],
];

foreach ($updates as $id => $relatedIds) {
    $post = BlogPost::find($id);
    if ($post) {
        $post->related_post_ids = $relatedIds;
        $post->save();
        echo "Updated Post {$id}: {$post->title}\n";
    } else {
        echo "WARNING: Post {$id} not found\n";
    }
}

echo "\nDone! Updated " . count($updates) . " posts.\n";
