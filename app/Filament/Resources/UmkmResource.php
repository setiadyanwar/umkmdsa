<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Models\Umkm;
use App\Rules\UniqueUmkmCategorySlug;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationLabel = 'UMKM';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informasi UMKM')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')
                            ->label('Nama Usaha')
                            ->placeholder('Contoh: PT Maju Jaya')
                            ->required(),

                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('logos')
                            ->nullable()
                            ->maxSize(2048)
                            ->avatar()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                            ])
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('1080')
                            ->imageResizeTargetHeight('1080')
                            ->helperText('Opsional. Logo dari usaha.'),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->placeholder('Pilih kategori usaha')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required()
                                    ->rules([
                                        'required',
                                        new UniqueUmkmCategorySlug()
                                    ])
                            ]),

                        DatePicker::make('registered_at')
                            ->label('Tanggal Terdaftar')
                            ->required()
                            ->helperText('Tanggal terdaftar di UMKM DSA.'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->nullable()
                            ->columnSpanFull()
                            ->rows(4)
                            ->placeholder('Tulis deskripsi usaha...')
                    ]),
                ])
                ->columns(1),

            Section::make('Kontak & Sosial Media')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->placeholder('08xxxxxxxxxx')
                            ->rule('regex:/^08[0-9]{8,12}$/')
                            ->tel()
                            ->required(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('example@domain.com')
                            ->nullable(),

                        TextInput::make('website')
                            ->label('Website')
                            ->url()
                            ->placeholder('https://www.website.com')
                            ->nullable(),

                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url()
                            ->placeholder('https://www.instagram.com/username')
                            ->nullable(),

                        TextInput::make('tiktok')
                            ->label('TikTok')
                            ->url()
                            ->placeholder('https://www.tiktok.com/username')
                            ->nullable(),

                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url()
                            ->placeholder('https://www.facebook.com/username')
                            ->nullable(),
                    ]),
                ])
                ->columns(1),

            Section::make('Jam Operasional & Alamat')
                ->schema([
                    Grid::make(2)->schema([
                        TimePicker::make('open_hour')
                            ->label('Jam Buka')
                            ->withoutSeconds(),

                        TimePicker::make('close_hour')
                            ->label('Jam Tutup')
                            ->withoutSeconds(),
                    ]),

                    TextInput::make('province')
                        ->label('Provinsi')
                        ->placeholder('Contoh: Jawa Barat')
                        ->required(),

                    TextInput::make('city')
                        ->label('Kota/Kabupaten')
                        ->placeholder('Contoh: Kota Bogor')
                        ->required(),

                    TextInput::make('address')
                        ->label('Alamat Lengkap')
                        ->placeholder('Alamat lengkap usaha')
                        ->required(),

                    TextInput::make('latitude')
                        ->label('Latitude')
                        ->placeholder('Latitude alamat')
                        ->numeric()
                        ->step(0.0000001)
                        ->nullable(),
                    
                    TextInput::make('longitude')
                        ->label('Longitude')
                        ->placeholder(placeholder: 'Longitude alamat')
                        ->numeric()
                        ->step(0.0000001)
                        ->nullable(),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->size(24)
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nama Usaha')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori'),
                    
                TextColumn::make('registered_at')
                    ->label(label: 'Terdaftar Pada')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
