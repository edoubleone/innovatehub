<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Models\Donation;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-heart';

    protected static \UnitEnum|string|null $navigationGroup = 'Fundraising';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function infolist(Schema $infolist): Schema
    {
        return $infolist->schema([
            Section::make('Gift')
                ->columns(3)
                ->schema([
                    TextEntry::make('amount')
                        ->money('USD'),
                    TextEntry::make('frequency')
                        ->badge()
                        ->color(fn ($state) => $state === 'monthly' ? 'success' : 'gray'),
                    TextEntry::make('status')
                        ->badge()
                        ->color(fn ($state) => match ($state) {
                            'completed' => 'success',
                            'failed'    => 'danger',
                            default     => 'warning',
                        }),
                ]),

            Section::make('Donor')
                ->columns(2)
                ->schema([
                    TextEntry::make('first_name')->default('—'),
                    TextEntry::make('last_name')->default('—'),
                    TextEntry::make('email')->default('—'),
                    IconEntry::make('is_anonymous')
                        ->label('Anonymous')
                        ->boolean(),
                ]),

            Section::make('Message')
                ->schema([
                    TextEntry::make('message')
                        ->default('—')
                        ->columnSpanFull(),
                ]),

            Section::make('Meta')
                ->columns(2)
                ->schema([
                    TextEntry::make('created_at')
                        ->label('Received')
                        ->dateTime('M j, Y \a\t g:ia'),
                    TextEntry::make('updated_at')
                        ->label('Last updated')
                        ->dateTime('M j, Y \a\t g:ia'),
                ]),
        ]);
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Gift')
                ->columns(3)
                ->schema([
                    TextInput::make('amount')
                        ->numeric()
                        ->prefix('$')
                        ->required(),
                    Select::make('frequency')
                        ->options([
                            'once'    => 'One-time',
                            'monthly' => 'Monthly',
                        ])
                        ->required(),
                    Select::make('status')
                        ->options([
                            'pending'   => 'Pending',
                            'completed' => 'Completed',
                            'failed'    => 'Failed',
                        ])
                        ->required(),
                ]),

            Section::make('Donor')
                ->columns(2)
                ->schema([
                    Toggle::make('is_anonymous')
                        ->label('Anonymous donation')
                        ->columnSpanFull()
                        ->live(),
                    TextInput::make('first_name')
                        ->hidden(fn ($get) => $get('is_anonymous')),
                    TextInput::make('last_name')
                        ->hidden(fn ($get) => $get('is_anonymous')),
                    TextInput::make('email')
                        ->email()
                        ->columnSpanFull()
                        ->hidden(fn ($get) => $get('is_anonymous')),
                ]),

            Section::make('Message')
                ->schema([
                    Textarea::make('message')
                        ->rows(3),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('donor_name')
                    ->label('Donor')
                    ->searchable(['first_name', 'last_name'])
                    ->weight('medium'),

                TextColumn::make('amount')
                    ->money('USD')
                    ->sortable(),

                TextColumn::make('frequency')
                    ->badge()
                    ->color(fn ($state) => $state === 'monthly' ? 'success' : 'gray'),

                IconColumn::make('is_anonymous')
                    ->label('Anon')
                    ->boolean(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'completed' => 'success',
                        'failed'    => 'danger',
                        default     => 'warning',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Received')
                    ->date('M j, Y')
                    ->sortable()
                    ->color('gray'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'completed' => 'Completed',
                        'failed'    => 'Failed',
                    ]),
                SelectFilter::make('frequency')
                    ->options([
                        'once'    => 'One-time',
                        'monthly' => 'Monthly',
                    ]),
                TernaryFilter::make('is_anonymous')
                    ->label('Anonymous'),
            ])
            ->actions([
                ViewAction::make(),
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
            'index'  => Pages\ListDonations::route('/'),
            'view'   => Pages\ViewDonation::route('/{record}'),
            'edit'   => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
