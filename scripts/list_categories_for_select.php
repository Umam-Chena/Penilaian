<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;

$categories = Category::all()->map(fn($c) => ['id' => $c->id, 'name' => $c->name])->toArray();
print_r($categories);
