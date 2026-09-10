<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortResource\Pages;
use App\Models\Cohort;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CohortResource extends Resource
{
    protected static ?string $model = Cohort::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    protected static \UnitEnum|string|null $navigationGroup = 'Admissions';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Identity')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(120)
                        ->placeholder('Cohort 25 — Spring')
                        ->columnSpanFull(),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->alphaDash()
                        ->helperText('Used in URLs, e.g. "cohort-25"'),

                    Select::make('status')
                        ->required()
                        ->options([
                            'upcoming'  => 'Upcoming',
                            'active'    => 'Active',
                            'completed' => 'Completed',
                        ])
                        ->default('upcoming'),
                ]),

            Section::make('Schedule')
                ->columns(2)
                ->schema([
                    DatePicker::make('start_date')
                        ->label('Start date')
                        ->nullable(),

                    DatePicker::make('end_date')
                        ->label('End date')
                        ->nullable()
                        ->afterOrEqual('start_date'),

                    DatePicker::make('acceptance_deadline')
                        ->label('Acceptance deadline')
                        ->helperText('Accepted students must confirm their place by this date. Shown in the acceptance email.')
                        ->nullable(),

                    Textarea::make('description')
                        ->rows(3)
                        ->nullable()
                        ->columnSpanFull(),
                ]),

            Section::make('Programs')
                ->schema([
                    Select::make('programs')
                        ->multiple()
                        ->relationship('programs', 'title')
                        ->preload()
                        ->searchable()
                        ->helperText('Select all programs offered in this cohort'),
                ]),

            Section::make('Display')
                ->schema([
                    TextInput::make('sort_order')
                        ->label('Sort order')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('slug')
                    ->badge()
                    ->color('gray')
                    ->fontFamily('mono'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'upcoming'  => 'info',
                        'active'    => 'success',
                        'completed' => 'gray',
                    }),

                TextColumn::make('programs.title')
                    ->label('Programs')
                    ->badge()
                    ->separator(',')
                    ->color('primary')
                    ->wrap(),

                TextColumn::make('start_date')
                    ->label('Starts')
                    ->date('M j, Y')
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Ends')
                    ->date('M j, Y')
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('acceptance_deadline')
                    ->label('Accept by')
                    ->date('M j, Y')
                    ->color('warning')
                    ->sortable()
                    ->placeholder('—'),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->date('M j, Y')
                    ->color('gray')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'upcoming'  => 'Upcoming',
                        'active'    => 'Active',
                        'completed' => 'Completed',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCohorts::route('/'),
            'create' => Pages\CreateCohort::route('/create'),
            'edit'   => Pages\EditCohort::route('/{record}/edit'),
        ];
    }
}
