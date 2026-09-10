<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class DonationsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $start     = Carbon::now()->startOfMonth();
        $now       = Carbon::now();
        $month     = $now->format('F Y');

        $total     = Donation::whereBetween('created_at', [$start, $now])->sum('amount');
        $count     = Donation::whereBetween('created_at', [$start, $now])->count();
        $recurring = Donation::where('frequency', 'monthly')
                        ->whereBetween('created_at', [$start, $now])->count();
        $pending   = Donation::where('status', 'pending')
                        ->whereBetween('created_at', [$start, $now])->count();

        return [
            Stat::make('Donations this month', '$'.number_format($total, 2))
                ->description($count.' gift'.($count === 1 ? '' : 's').' · '.$month)
                ->descriptionIcon('heroicon-m-heart')
                ->color('success'),

            Stat::make('Recurring donors', $recurring)
                ->description('Monthly pledges received this month')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('primary'),

            Stat::make('Pending donations', $pending)
                ->description('Awaiting confirmation this month')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
