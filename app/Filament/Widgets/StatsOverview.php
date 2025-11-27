<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', '120')
                ->description('Dummy')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 12, 18, 25, 35, 50, 65, 80, 95, 110, 115, 120])
                ->color('success'),
            
            Stat::make('Total Pemesanan', '450')
                ->description('Dummy')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([50, 100, 150, 200, 250, 300, 320, 350, 380, 410, 430, 450])
                ->color('warning'),
            
            Stat::make('Total Pelanggan', '210')
                ->description('Dummy')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([20, 35, 50, 70, 90, 110, 130, 150, 165, 180, 195, 210])
                ->color('info'),
            
            Stat::make('Total Pendapatan', 'Rp 75.000.000')
                ->description('Dummy')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([10000000, 15000000, 22000000, 30000000, 38000000, 45000000, 52000000, 58000000, 63000000, 68000000, 72000000, 75000000])
                ->color('success'),
        ];
    }
}