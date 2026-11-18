<?php
header('Content-Type: application/json; charset=utf-8');

// Ścieżka do folderu z ogłoszeniami
$directory = 'ogloszenia_pdf/';

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

// Sortujemy pliki (najnowsze na górze, jeśli nazwy zawierają daty lub po kolei)
rsort($files);

// Zwracamy listę plików jako tablicę JSON
echo json_encode($files);
?>