<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class PopularProducts extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

     protected static ?string $heading = 'Produk Terpopuler';

    protected function getTableQuery(): Builder
    {
        return Product::query()
            ->orderByDesc('views')
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('Nama Produk'),
            Tables\Columns\TextColumn::make('umkm.name')->label('UMKM'),
            Tables\Columns\TextColumn::make('views')->label('Views'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
