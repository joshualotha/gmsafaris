<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$posts = DB::table('blog_posts')->select('id', 'title', 'slug', 'is_published', 'created_at')->orderBy('id')->get();

echo "ID | Published | Title\n";
echo str_repeat('-', 80) . "\n";
foreach ($posts as $p) {
    $pub = $p->is_published ? 'YES      ' : 'NO       ';
    echo str_pad($p->id, 4) . " | {$pub} | {$p->title}\n";
}
echo "\nTotal: " . count($posts) . " posts in database\n";
