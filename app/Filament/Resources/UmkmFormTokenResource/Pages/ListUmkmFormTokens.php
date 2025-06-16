<?php

namespace App\Filament\Resources\UmkmFormTokenResource\Pages;

use App\Filament\Resources\UmkmFormTokenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUmkmFormTokens extends ListRecords
{
    protected static string $resource = UmkmFormTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
