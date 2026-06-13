<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$apiKey = env('GEMINI_API_KEY');
echo "API Key: " . substr($apiKey, 0, 5) . "...\n";

// Test listing models
$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . $apiKey;
$response = Illuminate\Support\Facades\Http::get($url);

echo "Status: " . $response->status() . "\n";
if ($response->successful()) {
    $models = $response->json();
    echo "Available models:\n";
    foreach ($models['models'] as $model) {
        echo "- " . $model['name'] . "\n";
    }
} else {
    echo "Error: " . $response->body() . "\n";
}
