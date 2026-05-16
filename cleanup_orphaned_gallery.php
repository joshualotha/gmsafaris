<?php
/**
 * Delete orphaned gallery DB records (IDs 292-296) whose files don't exist on disk.
 * Run after diagnose_gallery.php confirmed the files are missing.
 * 
 * On live server: php cleanup_orphaned_gallery.php
 */

require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\GalleryImage;

$orphanIds = [292, 293, 294, 295, 296];
$base = __DIR__;

$deleted = 0;
$kept = 0;

foreach ($orphanIds as $id) {
    $img = GalleryImage::find($id);
    if (!$img) {
        echo "ID=$id: not found in database (already deleted)\n";
        continue;
    }

    $fullPath = "$base/img/gallery/full/{$img->filename}";
    $thumbPath = "$base/img/gallery/thumb/{$img->filename}";
    $fullExists = file_exists($fullPath);
    $thumbExists = file_exists($thumbPath);

    if ($fullExists || $thumbExists) {
        echo "ID=$id ({$img->filename}): file exists on disk, KEEPING\n";
        $kept++;
    } else {
        echo "ID=$id ({$img->filename}): files missing, DELETING record\n";
        $img->delete();
        $deleted++;
    }
}

echo "\n=== DONE ===\n";
echo "Deleted: $deleted orphaned records\n";
echo "Kept: $kept records (files exist)\n";
echo "\nRe-upload the images through the admin gallery — they'll work now.\n";
