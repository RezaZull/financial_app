<?php

namespace App\Filament\Resources\MSavingsTargetResource\Pages;

use App\Filament\Resources\MSavingsTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMSavingsTarget extends EditRecord
{
    protected static string $resource = MSavingsTargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
