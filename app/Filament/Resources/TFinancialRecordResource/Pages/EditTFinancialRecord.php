<?php

namespace App\Filament\Resources\TFinancialRecordResource\Pages;

use App\Filament\Resources\TFinancialRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTFinancialRecord extends EditRecord
{
    protected static string $resource = TFinancialRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
