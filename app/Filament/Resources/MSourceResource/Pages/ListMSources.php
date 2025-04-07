<?php

namespace App\Filament\Resources\MSourceResource\Pages;

use App\Filament\Resources\MSourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMSources extends ListRecords
{
    protected static string $resource = MSourceResource::class;
    protected static ?string $title = 'Source Category';
    protected ?string $heading = 'Source Category';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add Category'),
        ];
    }
}
