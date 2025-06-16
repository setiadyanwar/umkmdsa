<?php

namespace App\Filament\Widgets;

use App\Models\UmkmForm;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentUmkmForms extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

     protected static ?string $heading = 'Form Terbaru';

    protected function getTableQuery(): Builder
    {
        return UmkmForm::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('Nama UMKM'),
            Tables\Columns\TextColumn::make('status')->label('Status')->badge()
                ->colors([
                    'primary' => 'pending',
                    'warning' => 'reviewing',
                    'success' => 'accepted',
                    'danger' => 'rejected',
                ]),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->date(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
