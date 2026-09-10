<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    protected static \UnitEnum|string|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Team member')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(120),

                    TextInput::make('role')
                        ->required()
                        ->maxLength(160)
                        ->placeholder('Head of Curriculum'),

                    TextInput::make('image')
                        ->label('Photo URL')
                        ->required()
                        ->url()
                        ->columnSpanFull(),

                    TextInput::make('sort_order')
                        ->label('Sort order')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->circular()
                    ->width(40)
                    ->height(40),

                TextColumn::make('name')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('role')
                    ->color('gray'),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->fontFamily('mono')
                    ->color('gray')
                    ->sortable(),
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
            'index'  => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit'   => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
