<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class VisitorsChart extends ChartWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung',
                    'data' => [12, 15, 18, 22, 20, 25, 28],
                    'backgroundColor' => '#f59e0b',
                    'borderColor' => '#f59e0b',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Static Visitors Chart',
                ],
            ],
        ];
    }
}