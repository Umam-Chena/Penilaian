<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$u = App\Models\User::find(2);
if (! $u) {
    echo "User not found\n";
    exit;
}

echo 'User can Create:Product => ' . ($u->can('Create:Product') ? 'yes' : 'no') . PHP_EOL;
