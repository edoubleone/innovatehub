<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use Filament\Widgets\ChartWidget;

class ApplicationsByStatusWidget extends ChartWidget
{
    protected ?string $heading = 'Applications by status';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 1;

    // protected  ?string $maxHeight = '280px';

    protected function getData(): array
    {
        $counts = Application::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->orderByRaw("CASE status
                WHEN 'received'  THEN 1
                WHEN 'reviewing' THEN 2
                WHEN 'interview' THEN 3
                WHEN 'accepted'  THEN 4
                WHEN 'declined'  THEN 5
                ELSE 6 END")
            ->pluck('total', 'status');

        $labels = [
            'received'  => 'Received',
            'reviewing' => 'Reviewing',
            'interview' => 'Interview',
            'accepted'  => 'Accepted',
            'declined'  => 'Declined',
        ];

        $colors = [
            'received'  => 'rgba(156,163,175,0.8)',
            'reviewing' => 'rgba(251,191,36,0.8)',
            'interview' => 'rgba(99,102,241,0.8)',
            'accepted'  => 'rgba(34,197,94,0.8)',
            'declined'  => 'rgba(239,68,68,0.8)',
        ];

        $orderedKeys = array_keys($labels);

        return [
            'datasets' => [
                [
                    'data'            => array_map(fn ($k) => $counts[$k] ?? 0, $orderedKeys),
                    'backgroundColor' => array_map(fn ($k) => $colors[$k], $orderedKeys),
                    'borderWidth'     => 0,
                    'hoverOffset'     => 6,
                ],
            ],
            'labels' => array_values($labels),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
