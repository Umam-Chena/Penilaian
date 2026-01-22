<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;

$id = $argv[1] ?? 11;
$categoryId = $argv[2] ?? 3;
$p = Product::find($id);
if (! $p) {
    echo "product not found\n";
    exit;
}
$p->category_id = $categoryId;
$p->save();
echo "Updated product category to $categoryId\n";