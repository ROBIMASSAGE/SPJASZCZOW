<?php
header('Content-Type: application/json; charset=utf-8');

// Ścieżka do folderu ze żłobka
$directory = 'zlobek_pdf/';

$files = array();

if (is_dir($directory)) {
    if ($handle = opendir($directory)) {
        while (($file = readdir($handle)) !== false) {
            // Pobieramy tylko pliki PDF, ignorujemy katalogi . i ..
            if ($file != "." && $file != ".." && strtolower(pathinfo($file, PATHINFO_EXTENSION)) == 'pdf') {
                $files[] = $file;
            }
        }
        closedir($handle);
    }
}

// Sortujemy pliki alfabetycznie lub odwrotnie
rsort($files);

// Zwracamy listę plików jako tablicę JSON
echo json_encode($files);
?>