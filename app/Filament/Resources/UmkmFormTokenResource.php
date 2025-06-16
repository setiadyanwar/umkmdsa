<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmFormTokenResource\Pages;
use App\Models\UmkmFormToken;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Str;

class UmkmFormTokenResource extends Resource
{
    protected static ?string $model = UmkmFormToken::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationGroup = 'UMKM Forms';

    protected static ?string $navigationLabel = 'Form Token';

    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('token')
                    ->label('Token')
                    ->formatStateUsing(fn($state) => substr($state, 0, 8) . '...')
                    ->copyable()
                    ->copyableState(fn($record) => $record->token) // Copy token penuh
                    ->searchable()
                    ->tooltip(fn($record) => $record->token), // Hover untuk lihat token penuh

                IconColumn::make('used')
                ->label('Terpakai')
                    ->boolean()
                    ->alignCenter(),

                TextColumn::make('expires_at')
                    ->label('Kedaluwarsa Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->color(fn($record) => $record->expires_at < now() ? 'danger' : ''),
            ])
            ->filters([
                Filter::make('used')
                    ->label('Sudah Digunakan')
                    ->query(fn($query) => $query->where('used', true)),

                Filter::make('unused')
                    ->label('Belum Digunakan')
                    ->query(fn($query) => $query->where('used', false)),

                Filter::make('expired')
                    ->label('Kedaluwarsa')
                    ->query(fn($query) => $query->where('expires_at', '<', now())),

                Filter::make('active')
                    ->label('Aktif')
                    ->query(fn(Builder $query) => $query->where('expires_at', '>', now())
                        ->where('used', false)),
            ])
            ->actions([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make('generate_token')
                    ->label('Buat Token Baru')
                    ->icon('heroicon-o-plus')
                    ->color('primary')
                    ->modalHeading('Token Berhasil Dibuat')
                    ->modalDescription('Token ini akan kedaluwarsa dalam 2 jam.')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup')
                    ->modalWidth('lg')
                    ->form([
                        TextInput::make('token_url')
                            ->label('URL Form')
                            ->readOnly()
                            ->helperText('Salin URL ini untuk dibagikan kepada UMKM')
                            ->suffixAction(
                                Action::make('copy_url')
                                    ->icon('heroicon-m-clipboard')
                                    ->tooltip('Salin URL')
                                    ->action(function ($component, $state) {
                                        $component->getLivewire()->js('
                                            navigator.clipboard.writeText("' . $state . '");
                                        ');

                                        Notification::make()
                                            ->title('URL berhasil disalin!')
                                            ->success()
                                            ->send();
                                    })
                            ),

                        Placeholder::make('token_info')
                            ->label('Informasi Token')
                            ->content('Token akan kedaluwarsa dalam 2 jam dan hanya dapat digunakan sekali.'),
                    ])
                    ->fillForm(function () {
                        $token = UmkmFormToken::create([
                            'token' => Str::uuid(),
                            'expires_at' => now()->addHours(2),
                            'used' => false,
                        ]);

                        return [
                            'token_url' => url('/form?token=' . $token->token) // TODO: Sesuaikan URL dengan path views nanti
                        ];
                    })
                    ->after(function () {
                        Notification::make()
                            ->title('Token berhasil dibuat!')
                            ->body('Token baru telah dibuat dan siap digunakan.')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListUmkmFormTokens::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        // Disable create karena token dibuat melalui header action
        return false;
    }
}
