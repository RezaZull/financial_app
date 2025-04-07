<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MSourceResource\Pages;
use App\Filament\Resources\MSourceResource\RelationManagers;
use App\Models\m_source;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MSourceResource extends Resource
{
    protected static ?string $model = m_source::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Source Category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name'),
                Select::make('source_cat')->options([
                    'inc'=> 'Incomes',
                    'exp'=> 'Expenses',
                ])->label('Category'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(true),
                TextColumn::make('source_cat')->label('Category')->formatStateUsing(fn ($state) => $state == 'inc'?"Incomes":"Expenses"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No Source Category');;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMSources::route('/'),
            'create' => Pages\CreateMSource::route('/create'),
            'edit' => Pages\EditMSource::route('/{record}/edit'),
        ];
    }
}
