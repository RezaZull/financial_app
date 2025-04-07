<?php

namespace App\Filament\Resources\MSavingsTargetResource\Pages;

use App\Filament\Resources\MSavingsTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMSavingsTarget extends CreateRecord
{
    protected static string $resource = MSavingsTargetResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_users'] = auth()->id();

        return $data;
    }
}
