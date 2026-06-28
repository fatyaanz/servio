<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$services = App\Models\ProviderService::orderBy('created_at', 'asc')->get();
$seen = [];
$deleted = 0;
foreach($services as $s) {
    $key = $s->provider_id . '-' . $s->category_id;
    if(isset($seen[$key])) {
        $s->delete();
        $deleted++;
    } else {
        $seen[$key] = true;
    }
}
echo "Deleted duplicates: " . $deleted . "\n";
