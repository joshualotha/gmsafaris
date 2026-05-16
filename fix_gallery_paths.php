<?php
/**
 * One-time fix: move gallery images from {root}/public/img/gallery/ to {root}/img/gallery/
 * 
 * Run on the live server after git pull:
 *   php fix_gallery_paths.php
 * 
 * This script handles the orphaned files from before the AppServiceProvider fix.
 */

$basePath = __DIR__;
$sourceDir = $basePath . '/public/img/gallery';
$targetDir = $basePath . '/img/gallery';

if (!is_dir($sourceDir)) {
    echo "OK: No orphaned public/img/gallery/ directory found. Nothing to migrate.\n";
    exit(0);
}

// Ensure target directories exist
foreach (['full', 'thumb'] as $sub) {
    $dir = $targetDir . '/' . $sub;
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "Created: $dir\n";
    }
}

$moved = 0;
$skipped = 0;

foreach (['full', 'thumb'] as $sub) {
    $src = $sourceDir . '/' . $sub;
    if (!is_dir($src)) continue;

    $files = scandir($src);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;

        $srcFile = $src . '/' . $file;
        $dstFile = $targetDir . '/' . $sub . '/' . $file;

        if (file_exists($dstFile)) {
            echo "SKIP: $file (already exists in target)\n";
            $skipped++;
        } else {
            rename($srcFile, $dstFile);
            echo "MOVED: $file -> img/gallery/$sub/\n";
            $moved++;
        }
    }
}

// Remove the stale public/ directory
// Only if it's safe (contains only gallery and is otherwise empty)
function removeEmptyDirs($dir) {
    if (!is_dir($dir)) return;
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            removeEmptyDirs($path);
        }
    }
    $remaining = array_diff(scandir($dir), ['.', '..']);
    if (empty($remaining)) {
        rmdir($dir);
        echo "Removed empty directory: $dir\n";
    }
}

removeEmptyDirs($sourceDir);

// Check if public/ is now empty
$pubFiles = array_diff(scandir($basePath . '/public'), ['.', '..']);
if (empty($pubFiles)) {
    rmdir($basePath . '/public');
    echo "Removed empty: public/\n";
} else {
    echo "WARNING: public/ still has contents, not removing: " . implode(', ', $pubFiles) . "\n";
}

$total = $moved + $skipped;
echo "\n=== Summary ===\n";
echo "Moved: $moved files\n";
echo "Skipped: $skipped files (already existed)\n";
echo "Total: $total files processed\n";
echo "Done.\n";
