<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ApplicationResource;
use App\Models\Application;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentApplicationsWidget extends BaseWidget
{
    protected static ?string $heading = 'Recent applications';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Application::query()->latest()->limit(8)
            )
            ->paginated(false)
            ->columns([
                TextColumn::make('full_name')
                    ->label('Applicant')
                    ->weight('medium')
                    ->searchable(['first_name', 'last_name']),

                TextColumn::make('program_slug')
                    ->label('Program')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'received'  => 'gray',
                        'reviewing' => 'warning',
                        'interview' => 'info',
                        'accepted'  => 'success',
                        'declined'  => 'danger',
                        default     => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Applied')
                    ->since()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('view')
                    ->url(fn (Application $record) => ApplicationResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye')
                    ->label('View'),
            ]);
    }
}
