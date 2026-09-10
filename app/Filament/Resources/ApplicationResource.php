<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use App\Models\Program;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static \UnitEnum|string|null $navigationGroup = 'Admissions';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'received')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function infolist(Schema $infolist): Schema
    {
        return $infolist->schema([
            Section::make('Applicant')
                ->columns(2)
                ->schema([
                    TextEntry::make('first_name'),
                    TextEntry::make('last_name'),
                    TextEntry::make('email'),
                    TextEntry::make('phone')->default('—'),
                ]),

            Section::make('Application')
                ->schema([
                    TextEntry::make('program_slug')
                        ->label('Program'),
                    TextEntry::make('experience')
                        ->label('Experience level')
                        ->formatStateUsing(fn ($state) => match ($state) {
                            'none'  => 'No experience',
                            'some'  => 'Some experience',
                            'a_lot' => 'A lot of experience',
                            default => $state ?? '—',
                        }),
                    TextEntry::make('why')
                        ->label('Why they want to join')
                        ->columnSpanFull(),
                    TextEntry::make('status')
                        ->badge()
                        ->color(fn ($state) => match ($state) {
                            'received'  => 'gray',
                            'reviewing' => 'warning',
                            'interview' => 'info',
                            'accepted'  => 'success',
                            'declined'  => 'danger',
                            default     => 'gray',
                        }),
                    TextEntry::make('created_at')
                        ->label('Submitted')
                        ->dateTime('M j, Y \a\t g:ia'),
                ]),
        ]);
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Applicant')
                ->columns(2)
                ->schema([
                    TextInput::make('first_name')->disabled(),
                    TextInput::make('last_name')->disabled(),
                    TextInput::make('email')->disabled(),
                    TextInput::make('phone')->disabled(),
                ]),

            Section::make('Application details')
                ->schema([
                    TextInput::make('program_slug')
                        ->label('Program')
                        ->disabled(),
                    TextInput::make('experience')
                        ->disabled(),
                    Textarea::make('why')
                        ->label('Why they want to join')
                        ->disabled()
                        ->rows(5),
                ]),

            Section::make('Admissions decision')
                ->schema([
                    Select::make('status')
                        ->options([
                            'received'  => 'Received',
                            'reviewing' => 'Reviewing',
                            'interview' => 'Interview',
                            'accepted'  => 'Accepted',
                            'declined'  => 'Declined',
                        ])
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('full_name')
                    ->label('Applicant')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(['first_name'])
                    ->weight('medium'),

                TextColumn::make('email')
                    ->searchable()
                    ->copyable()
                    ->color('gray'),

                TextColumn::make('program_slug')
                    ->label('Program')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('experience')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'none'  => 'None',
                        'some'  => 'Some',
                        'a_lot' => 'A lot',
                        default => '—',
                    })
                    ->color('gray'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'received'  => 'gray',
                        'reviewing' => 'warning',
                        'interview' => 'info',
                        'accepted'  => 'success',
                        'declined'  => 'danger',
                        default     => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Applied')
                    ->date('M j, Y')
                    ->sortable()
                    ->color('gray'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'received'  => 'Received',
                        'reviewing' => 'Reviewing',
                        'interview' => 'Interview',
                        'accepted'  => 'Accepted',
                        'declined'  => 'Declined',
                    ]),

                SelectFilter::make('program_slug')
                    ->label('Program')
                    ->options(
                        Program::orderBy('sort_order')
                            ->pluck('title', 'slug')
                            ->prepend('Not sure yet', 'unsure')
                    ),

                SelectFilter::make('experience')
                    ->options([
                        'none'  => 'No experience',
                        'some'  => 'Some experience',
                        'a_lot' => 'A lot of experience',
                    ]),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make()->label('Update status'),
                Action::make('advance')
                    ->label('Advance')
                    ->icon('heroicon-m-arrow-right')
                    ->color('success')
                    ->requiresConfirmation()
                    ->hidden(fn (Application $record) => in_array($record->status, ['accepted', 'declined']))
                    ->action(function (Application $record): void {
                        $next = match ($record->status) {
                            'received'  => 'reviewing',
                            'reviewing' => 'interview',
                            'interview' => 'accepted',
                            default     => $record->status,
                        };
                        $record->update(['status' => $next]);
                    }),

                Action::make('decline')
                    ->label('Decline')
                    ->icon('heroicon-m-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->hidden(fn (Application $record) => $record->status === 'declined')
                    ->action(fn (Application $record) => $record->update(['status' => 'declined'])),
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
            'index'  => Pages\ListApplications::route('/'),
            'view'   => Pages\ViewApplication::route('/{record}'),
            'edit'   => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
