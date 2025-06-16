<?php

namespace App\Filament\Widgets;

use App\Models\Umkm;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentUmkm extends BaseWidget
{
    protected static ?int $sort = 2;
    
    protected int|string|array $columnSpan = 'full';

     protected static ?string $heading = 'UMKM Terbaru';

    protected function getTableQuery(): Builder
    {
        return Umkm::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('Nama UMKM'),
            Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal Daftar')->date(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
