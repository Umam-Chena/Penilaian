<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;

$p = Product::find($argv[1] ?? 11);
if (! $p) {
    echo "Not found\n";
    exit;
}
print_r($p->toArray());
