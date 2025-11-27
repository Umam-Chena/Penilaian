<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
echo "Bootstrapping...\n";
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
echo "Bootstrapped\n";

use Illuminate\Support\Facades\DB;

$count = DB::table('roles')->count();
// show some details
$roles = DB::table('roles')->get();
$modelHasRoles = DB::table('model_has_roles')->get();
echo "roles: " . json_encode($roles->map(fn($r) => ['id' => $r->id, 'name' => $r->name, 'guard_name' => $r->guard_name])) . PHP_EOL;
echo "model_has_roles: " . json_encode($modelHasRoles) . PHP_EOL;

echo "roles count: $count\n";
