<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TFinancialRecordResource\Pages;
use App\Filament\Resources\TFinancialRecordResource\RelationManagers;
use App\Models\t_financial_record;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TFinancialRecordResource extends Resource
{
    protected static ?string $model = t_financial_record::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Financial Record';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('amount')
                ->numeric()
                ->prefix('Rp.'),
                Textarea::make('description'),
                Select::make('category')->options([
                    'inc'=> 'Incomes',
                    'exp'=> 'Expenses',
                ])->label('Category'),
                Select::make('id_m_source')
                ->label('Source')
                ->relationship('source.title',),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            ])->emptyStateHeading('No Financial Record');
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
            'index' => Pages\ListTFinancialRecords::route('/'),
            'create' => Pages\CreateTFinancialRecord::route('/create'),
            'edit' => Pages\EditTFinancialRecord::route('/{record}/edit'),
        ];
    }
}
