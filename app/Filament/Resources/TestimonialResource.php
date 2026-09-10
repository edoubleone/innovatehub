<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static \UnitEnum|string|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Quote')
                ->schema([
                    Textarea::make('quote')
                        ->required()
                        ->rows(3)
                        ->maxLength(600),

                    TextInput::make('name')
                        ->required()
                        ->maxLength(120),

                    TextInput::make('role')
                        ->label('Role / Employer')
                        ->required()
                        ->maxLength(160),
                ]),

            Section::make('Display')
                ->columns(2)
                ->schema([
                    TextInput::make('avatar_initial')
                        ->label('Avatar initial')
                        ->required()
                        ->maxLength(1)
                        ->placeholder('A'),

                    TextInput::make('sort_order')
                        ->label('Sort order')
                        ->numeric()
                        ->default(0),

                    Toggle::make('published')
                        ->label('Published on home page')
                        ->default(false)
                        ->columnSpanFull(),
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

                TextColumn::make('role')
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('quote')
                    ->limit(60)
                    ->color('gray'),

                ToggleColumn::make('published')
                    ->label('Live'),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->fontFamily('mono')
                    ->color('gray')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('published')
                    ->label('Published'),
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
            'index'  => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit'   => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
