<?php
$dir = './pliki_pdf/';
$result = [];

if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'pdf') {
            $result[] = $file;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>