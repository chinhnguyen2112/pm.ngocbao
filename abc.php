<?php

function zipFolder($source, $destination) {
    var_dump($source);
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZipArchive::CREATE)) {
        return false;
    }

    $source = realpath($source);
    if (is_dir($source)) {
        $iterator = new RecursiveDirectoryIterator($source);
        // Skip dot files while iterating 
        $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = realpath($file);
            if (is_dir($file)) {
                $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file . DIRECTORY_SEPARATOR));
            } else if (is_file($file)) {
                $zip->addFile($file, str_replace($source . DIRECTORY_SEPARATOR, '', $file));
            }
        }
    } else if (is_file($source)) {
        $zip->addFile($source, basename($source));
    }

    return $zip->close();
}

// Sử dụng hàm zipFolder
$sourceFolder = base_url().'upload';
$destinationZip =  base_url().'upload.zip';
if (zipFolder($sourceFolder, $destinationZip)) {
    echo 'Nén thành công!';
} else {
    echo 'Nén thất bại!';
}
?>
