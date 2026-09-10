<?php

namespace App\Filament\Resources\ApplicationResource\Pages;

use App\Filament\Resources\ApplicationResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),

            'received' => Tab::make('Received')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'received'))
                ->badge(fn () => \App\Models\Application::where('status', 'received')->count()),

            'reviewing' => Tab::make('Reviewing')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'reviewing'))
                ->badge(fn () => \App\Models\Application::where('status', 'reviewing')->count()),

            'interview' => Tab::make('Interview')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'interview'))
                ->badge(fn () => \App\Models\Application::where('status', 'interview')->count()),

            'accepted' => Tab::make('Accepted')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'accepted')),

            'declined' => Tab::make('Declined')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'declined')),
        ];
    }
}
