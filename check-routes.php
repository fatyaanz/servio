<?php
/**
 * Quick route middleware verification script
 * Checks which middleware are assigned to provider routes
 */

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$router = app('router');
$routes = $router->getRoutes();

echo "\n=== PROVIDER ROUTE MIDDLEWARE CHECK ===\n\n";

$issues = [];
foreach ($routes as $route) {
    $uri = $route->uri();
    // Only check /provider/* routes (not /provider-detail, /register-provider)
    if (strpos($uri, 'provider/') === 0) {
        $middleware = $route->middleware();
        $hasAuth = in_array('auth', $middleware);
        $hasProvider = in_array('provider', $middleware);
        $status = ($hasAuth && $hasProvider) ? '✅' : '❌ MISSING';
        if (!$hasAuth || !$hasProvider) {
            $issues[] = $uri;
        }
        $mwStr = implode(', ', $middleware);
        echo sprintf("  %s  %-45s  [%s]\n", $status, $uri, $mwStr);
    }
}

echo "\n";
if (empty($issues)) {
    echo "✅ ALL /provider/* ROUTES ARE PROPERLY PROTECTED!\n";
} else {
    echo "❌ UNPROTECTED ROUTES FOUND:\n";
    foreach ($issues as $uri) {
        echo "   - $uri\n";
    }
}
echo "\n";
