<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends Page
{
    // HAPUS navigationIcon, karena error
    // HAPUS semua static $view karena conflict dengan parent

    protected string $view = 'filament.pages.dashboard';

    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = 'Custom Dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverview::class,
            \App\Filament\Widgets\SalesChart::class,
            \App\Filament\Widgets\VisitorsChart::class,
        ];
    }
}
