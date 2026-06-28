<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$msg = App\Models\Message::first();
echo gettype($msg->created_at);
echo "\n";
echo is_object($msg->created_at) ? get_class($msg->created_at) : '';
