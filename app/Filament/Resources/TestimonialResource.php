<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Testimoni';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Testimoni')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->placeholder('Contoh: Budi Santoso')
                                    ->required(),

                                TextInput::make('role')
                                    ->label('Peran atau Jabatan')
                                    ->placeholder('Contoh: CEO PT Maju Jaya')
                                    ->required(),
                            ]),

                        Textarea::make('message')
                            ->label('Isi Testimoni')
                            ->rows(4)
                            ->placeholder('Tulis testimoni dari pengguna...')
                            ->required(),

                        Rating::make('rating')
                            ->size('lg')
                            ->default(5)
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Gambar dan Publikasi')
                    ->schema([
                        FileUpload::make('image_url')
                            ->label('Foto Profil')
                            ->image()
                            ->directory('testimonials')
                            ->imagePreviewHeight('150')
                            ->imageCropAspectRatio('1:1')
                            ->imageEditor()
                            ->nullable()
                            ->helperText('Opsional. Gambar akan ditampilkan sebagai avatar testimonial.'),

                        Toggle::make('is_published')
                            ->label('Tampilkan Secara Publik')
                            ->helperText('Nonaktifkan jika testimoni tidak ingin ditampilkan ke publik.')
                            ->default(true),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(label: 'Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label(label: 'Role'),

                RatingColumn::make('rating')
                    ->label(label: 'Rating')
                    ->size('sm')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label(label: 'Tampil Publik')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label(label: 'Ditambahkan Pada')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->options([
                        '1' => 'Tampil Publik',
                        '0' => 'Disembunyikan',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                    Tables\Actions\BulkAction::make('publish')
                        ->label('Tampilkan ke Publik')
                        ->icon('heroicon-o-eye')
                        ->requiresConfirmation()
                        ->action(fn($records) => $records->each->update(['is_published' => true])),

                    Tables\Actions\BulkAction::make('unpublish')
                        ->label('Sembunyikan dari Publik')
                        ->icon('heroicon-o-eye-slash')
                        ->requiresConfirmation()
                        ->action(fn($records) => $records->each->update(['is_published' => false])),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
