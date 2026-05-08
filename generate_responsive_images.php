<?php
/**
 * Generate responsive image sizes for srcset support
 * Creates 768w and 480w versions of hero images
 */

$images = [
    'serengeti-wildlife-safari',
    'maasai-people-tanzania', 
    'serengeti-adventure-safari',
    'ngorongoro-crater-safari',
];

$sizes = [
    ['suffix' => '768w', 'maxWidth' => 768],
    ['suffix' => '480w', 'maxWidth' => 480],
];

foreach ($images as $name) {
    $srcPath = __DIR__ . "/img/{$name}.webp";
    
    if (!file_exists($srcPath)) {
        echo "Source not found: {$srcPath}\n";
        continue;
    }
    
    $info = getimagesize($srcPath);
    if (!$info) {
        echo "Cannot read: {$srcPath}\n";
        continue;
    }
    
    $srcWidth = $info[0];
    $srcHeight = $info[1];
    $mime = $info['mime'];
    
    echo "Processing {$name} ({$srcWidth}x{$srcHeight})...\n";
    
    // Create source image from WebP
    $srcImg = imagecreatefromwebp($srcPath);
    if (!$srcImg) {
        echo "  Failed to create image from {$srcPath}\n";
        continue;
    }
    
    foreach ($sizes as $size) {
        $destPath = __DIR__ . "/img/{$name}-{$size['suffix']}.webp";
        $destWidth = $size['maxWidth'];
        $destHeight = (int)($srcHeight * ($destWidth / $srcWidth));
        
        $destImg = imagescale($srcImg, $destWidth, $destHeight);
        if (!$destImg) {
            echo "  Failed to scale to {$destWidth}w\n";
            continue;
        }
        
        imagewebp($destImg, $destPath, 80);
        imagedestroy($destImg);
        
        $fileSize = filesize($destPath);
        echo "  Created {$name}-{$size['suffix']}.webp ({$destWidth}x{$destHeight}, {$fileSize} bytes)\n";
    }
    
    imagedestroy($srcImg);
}

echo "\nDone! Responsive images generated.\n";
