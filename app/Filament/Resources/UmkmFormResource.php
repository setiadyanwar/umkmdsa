<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmFormResource\Pages;
use App\Models\UmkmForm;
use App\Rules\UniqueUmkmCategorySlug;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Str;

class UmkmFormResource extends Resource
{
    protected static ?string $model = UmkmForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'UMKM Forms';

    protected static ?string $navigationLabel = 'Form List';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->disabled(function ($record) {
                if (!$record) {
                    return false; // Jangan disable saat create form
                }

                return in_array($record->status, ['accepted', 'rejected']);
            })
            ->schema([
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
                                ->directory('form_logos')
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

                            DatePicker::make('started_at')
                                ->label('Tanggal Mulai Usaha')
                                ->required(),

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

                Section::make('Lampiran File')
                    ->schema([
                        Repeater::make('attachments')
                            ->relationship()
                            ->schema([
                                FileUpload::make('file_path')
                                    ->label('File')
                                    ->directory('form_attachments')
                                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                                        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                                        $extension = $file->getClientOriginalExtension();
                                        $uuid = Str::random(6);
                                        return Str::slug($originalName) . '-' . $uuid . '.' . $extension;
                                    })
                                    ->downloadable()
                                    ->previewable()
                                    ->openable()
                                    ->acceptedFileTypes([
                                        'application/pdf',
                                        'image/png',
                                        'image/jpeg',
                                        'application/msword', // .doc
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                                    ])
                                    ->maxSize(2048)
                                    ->required()
                                    ->helperText('Format: PDF, DOC, JPG, atau PNG. Maksimum 2MB per file.')
                            ])
                            ->label('Lampiran')
                            ->addActionLabel('Tambah File')
                            ->reorderable(false)
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Status Pendaftaran')
                    ->schema([
                        Placeholder::make('status')
                            ->label('Status Saat Ini')
                            ->content(fn($record) => Str::ucfirst($record->status ?? 'pending'))
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->visible(fn($record) => filled($record)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Usaha')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'reviewing',
                        'success' => 'accepted',
                        'danger' => 'rejected',
                    ]),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewing' => 'Reviewing',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),
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
            'index' => Pages\ListUmkmForms::route('/'),
            'create' => Pages\CreateUmkmForm::route('/create'),
            'edit' => Pages\EditUmkmForm::route('/{record}/edit'),
        ];
    }
}