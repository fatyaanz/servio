<?php
$files = glob('app/Models/*.php');
foreach ($files as $file) {
    $content = file_get_contents($file);
    $content = str_replace('Illuminate\Database\Eloquent\Model', 'Jenssegers\Mongodb\Eloquent\Model', $content);
    file_put_contents($file, $content);
    echo "Updated $file\n";
}
