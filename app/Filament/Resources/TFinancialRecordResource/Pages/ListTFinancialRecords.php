<?php

namespace App\Filament\Resources\TFinancialRecordResource\Pages;

use App\Filament\Resources\TFinancialRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTFinancialRecords extends ListRecords
{
    protected static string $resource = TFinancialRecordResource::class;
    protected static ?string $title = 'Financial Recodrd';
    protected ?string $heading = 'Financial Recodrd';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add Financial Record'),
        ];
    }
}
