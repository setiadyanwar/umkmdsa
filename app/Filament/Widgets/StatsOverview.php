<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Umkm;
use App\Models\UmkmForm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected function getCards(): array
    {
        return [
            Card::make('Total UMKM Terdaftar', Umkm::count())
                ->icon('heroicon-o-building-storefront'),

            Card::make('Total Produk', Product::count())
                ->icon('heroicon-o-shopping-bag'),

            Card::make('Form Pending', UmkmForm::where('status', 'pending')->count())
                ->icon('heroicon-o-clock'),
        ];
    }
}
