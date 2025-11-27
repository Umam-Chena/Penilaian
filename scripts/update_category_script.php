<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;

$c = Category::first();
if (! $c) {
    echo "No categories\n";
    exit;
}

echo "Before: " . $c->name . PHP_EOL;
$c->update(['name' => 'Updated Name ' . rand(100, 999)]);
$c = Category::first();
echo "After: " . $c->name . PHP_EOL;
