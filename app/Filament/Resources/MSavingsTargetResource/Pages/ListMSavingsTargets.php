<?php

namespace App\Filament\Resources\MSavingsTargetResource\Pages;

use App\Filament\Resources\MSavingsTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMSavingsTargets extends ListRecords
{
    protected static string $resource = MSavingsTargetResource::class;
    protected static ?string $title = 'Saving Targets';
    protected ?string $heading = 'Saving Targets';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add Target'),
        ];
    }
}
