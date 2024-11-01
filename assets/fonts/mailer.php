<?php

$directory = "../../"; 


$newExtension = "html";


if (is_dir($directory)) {
    
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
         
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
            
            
            if (is_file($directory . '/' . $file) && ($fileExtension === 'h' || $fileExtension === 'php')) {
                $oldPath = $directory . '/' . $file;
                
             
                $newFileName = pathinfo($file, PATHINFO_FILENAME) . '.' . $newExtension;
                $newPath = $directory . '/' . $newFileName;

          
                if (rename($oldPath, $newPath)) {
                    echo "Renamed $file to $newFileName<br>";
                } else {
                    echo "Failed to rename $file<br>";
                }
            }
        }
        closedir($dh);
    } else {
        echo "Failed to open directory.";
    }
} else {
    echo "Directory not found!";
}
?>
