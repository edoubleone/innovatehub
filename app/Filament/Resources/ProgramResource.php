<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static \UnitEnum|string|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Identity')
                ->columns(3)
                ->schema([
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->helperText('Used in URLs, e.g. "web", "data"')
                        ->alphaDash(),

                    TextInput::make('num')
                        ->label('Number')
                        ->required()
                        ->maxLength(4)
                        ->placeholder('01'),

                    TextInput::make('glyph')
                        ->required()
                        ->maxLength(4)
                        ->placeholder('W')
                        ->helperText('Single letter shown in the visual'),
                ]),

            Section::make('Content')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(160)
                        ->columnSpanFull(),

                    Textarea::make('short')
                        ->label('Short description')
                        ->required()
                        ->maxLength(240)
                        ->rows(2)
                        ->helperText('One-liner shown on program cards'),

                    Textarea::make('long')
                        ->label('Full description')
                        ->required()
                        ->rows(6),
                ]),

            Section::make('Programme details')
                ->columns(2)
                ->schema([
                    TextInput::make('duration')
                        ->required()
                        ->placeholder('12–16 weeks'),

                    TextInput::make('format')
                        ->required()
                        ->placeholder('Full-time, remote'),

                    Select::make('cohorts')
                        ->multiple()
                        ->relationship('cohorts', 'name')
                        ->preload()
                        ->searchable()
                        ->helperText('Cohorts this program belongs to')
                        ->columnSpanFull(),
                ]),

            Section::make('Display')
                ->columns(2)
                ->schema([
                    TagsInput::make('skills')
                        ->required()
                        ->helperText('Press Enter or comma to add a skill')
                        ->columnSpanFull(),

                    ColorPicker::make('color')
                        ->required()
                        ->default('#7c3aed'),

                    TextInput::make('sort_order')
                        ->label('Sort order')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),

                    TextInput::make('image')
                        ->label('Image URL')
                        ->required()
                        ->url()
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
                ColorColumn::make('color')
                    ->label('')
                    ->width('40px'),

                TextColumn::make('num')
                    ->label('#')
                    ->width('50px')
                    ->fontFamily('mono')
                    ->color('gray'),

                TextColumn::make('title')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('slug')
                    ->badge()
                    ->color('gray')
                    ->fontFamily('mono'),

                TextColumn::make('duration')
                    ->color('gray'),

                TextColumn::make('cohorts.name')
                    ->label('Cohorts')
                    ->badge()
                    ->separator(',')
                    ->color('info'),

                TextColumn::make('skills')
                    ->label('Skills')
                    ->badge()
                    ->separator(',')
                    ->color('gray'),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->date('M j, Y')
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
            'index'  => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit'   => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
