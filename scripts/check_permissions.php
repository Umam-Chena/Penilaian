<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\User;

$perms = DB::table('permissions')->get();
$rolePerms = DB::table('role_has_permissions')->get();
echo "permissions: " . json_encode($perms->map(fn($p) => ['id' => $p->id, 'name' => $p->name])) . PHP_EOL;
echo "role_has_permissions: " . json_encode($rolePerms) . PHP_EOL;

$role = DB::table('roles')->where('name', 'super_admin')->first();
if ($role) {
    $hasCreateProduct = DB::table('role_has_permissions')
        ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
        ->where('role_has_permissions.role_id', $role->id)
        ->where('permissions.name', 'Create:Product')
        ->exists();

    echo "Super admin role has 'Create:Product': " . ($hasCreateProduct ? 'true' : 'false') . PHP_EOL;
}

$u = User::find(2);
if ($u) {
    echo "User #2 roles: " . $u->roles->pluck('name')->implode(',') . PHP_EOL;
    echo "User #2 permissions: " . implode(',', $u->getAllPermissions()->pluck('name')->toArray()) . PHP_EOL;
}
