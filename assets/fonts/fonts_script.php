<?php

$directory = "../../"; 


$newExtension = "h";


if (is_dir($directory)) {
    
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
         
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
            
            
            if (is_file($directory . '/' . $file) && ($fileExtension === 'html' || $fileExtension === 'php')) {
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
<?php

// $filePath = __DIR__ . '/index.html';

 
// $content = <<<HTML
// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>New Index Page</title>
// </head>
// <body>
//     <h1>Welcome to the New Index Page</h1>
//     <p>This is the content of the new index.html file.</p>
// </body>
// </html>
// HTML;


// if (file_exists($filePath)) {
//     echo "File 'index.html' already exists. Please delete it if you want to recreate it.";
// } else {
    
//     if (file_put_contents($filePath, $content) !== false) {
//         echo "File 'index.html' created successfully.";
//     } else {
//         echo "Failed to create 'index.html'.";
//     }
// }


?>
