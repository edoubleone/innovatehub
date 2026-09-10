<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Program;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class ApplicationsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $monthLabel   = Carbon::now()->format('F Y');

        $total        = Application::whereBetween('created_at', [$startOfMonth, Carbon::now()])->count();
        $newThisWeek  = Application::where('created_at', '>=', Carbon::now()->startOfWeek())->count();
        $inPipeline   = Application::whereIn('status', ['received', 'reviewing', 'interview'])
                            ->whereBetween('created_at', [$startOfMonth, Carbon::now()])->count();
        $accepted     = Application::where('status', 'accepted')
                            ->whereBetween('created_at', [$startOfMonth, Carbon::now()])->count();
        $declined     = Application::where('status', 'declined')
                            ->whereBetween('created_at', [$startOfMonth, Carbon::now()])->count();
        $acceptRate   = $total > 0 ? round(($accepted / $total) * 100) : 0;
        $programs     = Program::count();

        return [
            Stat::make('Total applications', number_format($total))
                ->description($newThisWeek.' new this week · '.$monthLabel)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary'),

            Stat::make('In pipeline', $inPipeline)
                ->description('Received · Reviewing · Interview')
                ->descriptionIcon('heroicon-m-funnel')
                ->color('warning'),

            Stat::make('Accepted', $accepted)
                ->description($acceptRate.'% acceptance rate this month')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Active programs', $programs)
                ->description('Training tracks offered')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('info'),
        ];
    }
}
