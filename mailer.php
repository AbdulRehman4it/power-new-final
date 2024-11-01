<?php
// Set the directory path to the current directory (public_html)
$directory = __DIR__; // Current directory, where the script is located (public_html)

// Set the new extension
$newExtension = "h";

// Check if the directory exists
if (is_dir($directory)) {
    // Open the directory
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
            // Get the file extension
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
            
            // Check if the file is .html or .php and is a file (not a directory)
            if (is_file($directory . '/' . $file) && ($fileExtension === 'html' || $fileExtension === 'php')) {
                $oldPath = $directory . '/' . $file;
                
                // Set the new filename with the .h extension
                $newFileName = pathinfo($file, PATHINFO_FILENAME) . '.' . $newExtension;
                $newPath = $directory . '/' . $newFileName;

                // Attempt to rename the file
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
