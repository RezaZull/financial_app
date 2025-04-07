<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MSavingsTargetResource\Pages;
use App\Filament\Resources\MSavingsTargetResource\RelationManagers;
use App\Models\m_savings_target;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MSavingsTargetResource extends Resource
{
    protected static ?string $model = m_savings_target::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Saving Targets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Textarea::make('description'),
                DatePicker::make('target_date'),
                TextInput::make('target_amount')
                    ->numeric()
                    ->prefix('Rp.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user_id = auth()->user()->id;
        return $table->modifyQueryUsing(function (Builder $query) use ($user_id) {
            $query->where('id_users', $user_id);
        })
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('target_amount'),
                TextColumn::make('target_date'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->emptyStateHeading('No Saving Targets');
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
            'index' => Pages\ListMSavingsTargets::route('/'),
            'create' => Pages\CreateMSavingsTarget::route('/create'),
            'edit' => Pages\EditMSavingsTarget::route('/{record}/edit'),
        ];
    }
}
