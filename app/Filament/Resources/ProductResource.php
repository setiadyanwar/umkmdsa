<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Rules\UniqueProductCategorySlug;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Produk')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Produk')
                                    ->placeholder('Tulis nama produk...')
                                    ->required(),

                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name', fn($query) => $query->orderBy('name'))
                                    ->placeholder('Pilih kategori produk')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nama Kategori')
                                            ->required()
                                            ->rules([
                                                'required',
                                                new UniqueProductCategorySlug()
                                            ])
                                    ]),

                                Select::make('umkm_id')
                                    ->label('UMKM')
                                    ->relationship('umkm', 'name')
                                    ->placeholder('Pilih UMKM')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                TagsInput::make('tags')
                                    ->label('Tag Produk')
                                    ->placeholder('Tambahkan tag produk'),
                            ]),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->placeholder('Tulis deskripsi produk...')
                            ->nullable(),
                    ])
                    ->columns(1),

                Section::make('Harga Produk')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('price_original')
                                    ->label('Harga Asli')
                                    ->placeholder('Contoh: 1500000')
                                    ->numeric()
                                    ->minValue(0)
                                    ->required()
                                    ->rule('regex:/^[0-9]+$/'),

                                TextInput::make('price_final')
                                    ->label('Harga Akhir')
                                    ->placeholder('Contoh: 1500000')
                                    ->numeric()
                                    ->minValue(0)
                                    ->required()
                                    ->rule('regex:/^[0-9]+$/'),

                                Toggle::make('has_discount')
                                    ->label('Ada Diskon?')
                                    ->helperText('Aktifkan jika produk sedang diskon.'),
                            ]),
                        TextInput::make('discount_percent')
                            ->label('Persentase Diskon')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->helperText('0 - 100 %'),
                    ])
                    ->columns(1),

                Section::make('Gambar Produk')
                    ->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->directory('products')
                            ->image()
                            ->maxFiles(5)
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                            ])
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('1080')
                            ->imageResizeTargetHeight('1080')
                            ->panelLayout('grid')
                            ->storeFiles()
                            ->maxSize(2048)
                            ->label('Upload Gambar')
                            ->helperText('Max 5 gambar, disarankan 1:1. Seret gambar untuk mengubah urutan. Gambar pertama akan menjadi gambar utama.')
                            ->afterStateHydrated(function (FileUpload $component) {
                                $record = $component->getRecord();

                                if ($record && $record->images) {
                                    $images = $record->images->pluck('image_url')->toArray();

                                    $component->state($images);
                                }
                            })
                    ]),

                Hidden::make('views')->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(label: 'Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('umkm.name')
                    ->label('UMKM'),

                TextColumn::make('category.name')
                    ->label('Kategori'),

                TextColumn::make('price_final')
                    ->label('Harga')
                    ->formatStateUsing(fn($state) => 'Rp' . number_format($state, 0, ',', '.'))
                    ->sortable(),

                IconColumn::make('has_discount')
                    ->label('Diskon')
                    ->alignCenter()
                    ->boolean(),

                TagsColumn::make('tags'),

                TextColumn::make('views')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(label: 'Dibuat Pada')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),

                SelectFilter::make('umkm')
                    ->relationship('umkm', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');

    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['images']); // delete image field
        return $data;
    }

    public static function afterCreate(Form $form, $record): void
    {
        self::handleProductImages($form, $record); // Handle simpan gambar ke product_images
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['images']); // Hapus field images
        return $data;
    }

    public static function afterSave(Form $form, $record): void
    {
        $images = $form->getState()['images'] ?? [];

        // Ambil data gambar lama dari DB, key by image_url
        $existingImages = $record->images->keyBy('image_url');

        // Cari gambar yang tidak ada di form
        $deletedImages = $existingImages->keys()->diff($images);

        // Hapus dari storage dan database
        foreach ($deletedImages as $imageUrl) {
            Storage::disk('public')->delete($imageUrl);
            $record->images()->where('image_url', $imageUrl)->delete();
        }

        // Simpan/update gambar baru
        foreach ($images as $index => $imagePath) {
            if ($existingImages->has($imagePath)) {
                $existingImages->get($imagePath)->update([
                    'order' => $index + 1,
                    'is_primary' => $index === 0,
                ]);
            } else {
                $record->images()->create([
                    'image_url' => $imagePath,
                    'is_primary' => $index === 0,
                    'order' => $index + 1,
                ]);
            }
        }
    }

    protected static function handleProductImages(Form $form, Product $product): void
    {
        $images = $form->getState()['images'] ?? [];

        foreach ($images as $index => $imagePath) {
            $product->images()->create([
                'image_url' => $imagePath,
                'is_primary' => $index === 0,
                'order' => $index + 1,
            ]);
        }
    }

}
