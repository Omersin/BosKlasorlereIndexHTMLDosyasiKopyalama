<?php
$taranacakklasor = "1/";
function indexHtmlKontrol($taranacakKlasor) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($taranacakKlasor, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $dosya) {
        if ($dosya->isDir()) {
            $indexDosyasi = $dosya->getPathname() . '/index.html';

            if (!file_exists($indexDosyasi)) {
                file_put_contents($indexDosyasi, '');
                echo "Boş index.html dosyası oluşturuldu: " . $indexDosyasi . "\n";
            } else {
                echo "index.html dosyası zaten mevcut: " . $indexDosyasi . "\n";
            }
        }
    }
}

indexHtmlKontrol($taranacakklasor);