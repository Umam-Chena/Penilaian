<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;

$c = Category::first();
if (! $c) {
    $c = Category::create(['name' => 'Category For CreateProduct']);
}

$created = $c->products()->create(['name' => 'FromScriptProduct', 'price' => 100, 'stock' => 5]);

echo 'Created product id = ' . $created->id . PHP_EOL;