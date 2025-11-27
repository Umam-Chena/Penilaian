<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;

$u = User::first();
if (! $u) {
    echo "No user found\n";
    exit;
}

echo "isRelation roles: " . ($u->isRelation('roles') ? 'true' : 'false') . PHP_EOL;
echo "has attribute roles: " . ($u->hasAttribute('roles') ? 'true' : 'false') . PHP_EOL;
echo "method exists roles: " . (method_exists($u, 'roles') ? 'true' : 'false') . PHP_EOL;

echo "roles method returns: ";
try {
    $r = $u->roles();
    echo get_class($r) . PHP_EOL;
} catch (Throwable $e) {
    echo 'exception ' . get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
}

echo "User assigned roles: ";
try {
    echo $u->roles->pluck('name')->implode(',') . PHP_EOL;
} catch (Throwable $e) {
    echo 'exception ' . get_class($e) . ': ' . $e->getMessage() . PHP_EOL;
}
