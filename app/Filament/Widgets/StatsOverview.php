<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->description('Jumlah produk yang tersedia')
                ->icon('heroicon-o-cube'),

            Stat::make('Total Categories', Category::count())
                ->description('Jumlah kategori')
                ->icon('heroicon-o-cube'),

            Stat::make('Total Users', User::count())
                ->description('User terdaftar')
                ->icon('heroicon-o-cube'),
        ];
    }
}
