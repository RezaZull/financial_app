<?php

namespace App\Filament\Resources\MSourceResource\Pages;

use App\Filament\Resources\MSourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMSource extends EditRecord
{
    protected static string $resource = MSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
