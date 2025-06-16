<?php

namespace App\Filament\Resources\UmkmFormResource\Pages;

use App\Filament\Resources\UmkmFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUmkmForms extends ListRecords
{
    protected static string $resource = UmkmFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
