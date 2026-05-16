<?php
/**
 * Diagnostic: Check gallery image records vs actual files on disk.
 * Run on live server: php diagnose_gallery.php
 */

$base = __DIR__;

echo "=== GALLERY IMAGE DIAGNOSTIC ===\n\n";

// 1. Check if target directories exist and are writable
foreach (['img/gallery/full', 'img/gallery/thumb'] as $dir) {
    $path = "$base/$dir";
    $exists = is_dir($path);
    $writable = $exists && is_writable($path);
    echo "[DIR] $dir\n";
    echo "  Exists: " . ($exists ? 'YES' : 'NO') . "\n";
    echo "  Writable: " . ($writable ? 'YES' : ($exists ? 'NO (PERMISSION PROBLEM!)' : 'N/A')) . "\n";
    if ($exists) {
        $count = count(array_diff(scandir($path), ['.', '..']));
        echo "  File count: $count\n";
    }
    echo "\n";
}

// 2. Check if public/ directory exists (should NOT exist after cPanel restructure)
$publicDir = "$base/public";
if (is_dir($publicDir)) {
    echo "[WARN] public/ directory still exists! This should have been removed.\n";
    $pubFiles = count(array_diff(scandir($publicDir), ['.', '..']));
    echo "  Contents: $pubFiles items\n\n";
} else {
    echo "[OK] No public/ directory (correct for cPanel root deployment)\n\n";
}

// 3. Check database records vs filesystem
try {
    require_once "$base/vendor/autoload.php";
    $app = require_once "$base/bootstrap/app.php";
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    $images = \App\Models\GalleryImage::all();
    $total = $images->count();
    $missing = 0;
    $found = 0;
    $missingList = [];

    foreach ($images as $img) {
        $fullPath = "$base/img/gallery/full/{$img->filename}";
        $thumbPath = "$base/img/gallery/thumb/{$img->filename}";
        $fullExists = file_exists($fullPath);
        $thumbExists = file_exists($thumbPath);

        if ($fullExists && $thumbExists) {
            $found++;
        } else {
            $missing++;
            $missingList[] = [
                'id' => $img->id,
                'filename' => $img->filename,
                'original_name' => $img->original_name,
                'full_exists' => $fullExists,
                'thumb_exists' => $thumbExists,
            ];
        }
    }

    echo "=== DATABASE vs FILESYSTEM ===\n";
    echo "Total DB records: $total\n";
    echo "Files found on disk: $found\n";
    echo "Files MISSING on disk: $missing\n\n";

    if ($missing > 0) {
        echo "=== MISSING FILES ===\n";
        foreach ($missingList as $m) {
            $status = [];
            if (!$m['full_exists']) $status[] = 'full MISSING';
            if (!$m['thumb_exists']) $status[] = 'thumb MISSING';
            echo "  ID={$m['id']} | {$m['filename']} | " . implode(', ', $status) . " | orig: {$m['original_name']}\n";
        }
        echo "\n";
    }

    // Show a sample of files that DO exist on disk for comparison
    if ($found > 0) {
        echo "=== SAMPLE OF EXISTING FILES ===\n";
        $existing = $images->filter(function($img) use ($base) {
            return file_exists("$base/img/gallery/full/{$img->filename}");
        })->take(5);
        foreach ($existing as $img) {
            $size = filesize("$base/img/gallery/full/{$img->filename}");
            echo "  {$img->filename} (" . round($size/1024, 1) . "KB) | orig: {$img->original_name}\n";
        }
    }

} catch (\Exception $e) {
    echo "[ERROR] Could not bootstrap Laravel: {$e->getMessage()}\n";
    echo "Running basic filesystem check instead...\n\n";

    // Fallback: just list files in gallery dirs
    foreach (['img/gallery/full', 'img/gallery/thumb'] as $dir) {
        $path = "$base/$dir";
        if (is_dir($path)) {
            $files = array_diff(scandir($path), ['.', '..']);
            $sample = array_slice($files, 0, 10);
            echo "Files in $dir (first 10):\n";
            foreach ($sample as $f) {
                $size = filesize("$path/$f");
                echo "  $f (" . round($size/1024, 1) . "KB)\n";
            }
            echo "  ... " . count($files) . " total files\n\n";
        }
    }
}

echo "\n=== DONE ===\n";
