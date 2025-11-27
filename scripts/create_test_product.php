<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Category;
use App\Models\Product;

try {
    $category = Category::first();
    if (! $category) {
        $category = Category::create(['name' => 'Test Category From Script']);
    }
    $product = Product::create(['name' => 'Test Product Script', 'price' => 500, 'category_id' => $category->id]);
    echo 'Created product id = ' . $product->id . PHP_EOL;
} catch (Throwable $e) {
    echo 'Exception: ' . get_class($e) . ' - ' . $e->getMessage() . PHP_EOL;
}
