<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Check sessions table to see who's logged in
try {
    $sessions = DB::table('sessions')->get();
    echo "\n=== ACTIVE SESSIONS ===\n";
    foreach ($sessions as $sess) {
        $payload = unserialize(base64_decode($sess->payload));
        $userId = $payload['_token'] ?? 'unknown';
        // Try to find auth id
        $loginKey = null;
        foreach ($payload as $k => $v) {
            if (strpos($k, 'login_web') !== false) {
                $loginKey = $v;
                break;
            }
        }
        if ($loginKey) {
            $user = App\Models\User::find($loginKey);
            echo "  Session: {$sess->id}\n";
            echo "  User: " . ($user ? "{$user->name} ({$user->email}) - Role: {$user->role}" : "Unknown ID: $loginKey") . "\n";
            echo "  Last Activity: " . date('Y-m-d H:i:s', $sess->last_activity) . "\n\n";
        }
    }
} catch (\Exception $e) {
    echo "Sessions table error: " . $e->getMessage() . "\n";
    echo "\nChecking all users:\n";
    App\Models\User::all(['id','name','email','role','status'])->each(function($u) {
        echo "  ID:{$u->id} | {$u->name} | {$u->email} | {$u->role} | {$u->status}\n";
    });
}
