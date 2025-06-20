<?php

namespace App\Filament\Resources\UmkmFormResource\Pages;

use App\Filament\Resources\UmkmFormResource;
use App\Models\Umkm;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditUmkmForm extends EditRecord
{
    protected static string $resource = UmkmFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        $disabled = in_array($this->record->status, ['accepted', 'rejected']);
        return [
            $this->getSaveFormAction()->disabled($disabled),
            $this->getCancelFormAction(),

            Actions\Action::make('reject')
                ->label('Tolak Permohonan')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->visible(fn() => $this->record->status !== 'accepted' && $this->record->status !== 'rejected')
                ->requiresConfirmation()
                ->action(function () {
                    $this->record->update(['status' => 'rejected']);
                    Notification::make()
                        ->title('Ditolak')
                        ->body('Form ditolak.')
                        ->warning()
                        ->send();

                }),

            Actions\Action::make('approve')
                ->label('Setujui & Tambahkan ke UMKM')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => $this->record->status !== 'accepted')
                ->requiresConfirmation()
                ->action(function () {
                    $data = $this->form->getState(); // Ambil data terbaru dari form
        
                    // Simpan perubahan ke record
                    $this->record->update($data);

                    $record = $this->record;

                    $record->update(['status' => 'accepted']);

                    // Pindah file logo jika ada
                    $logoPath = null;

                    if ($record->logo) {
                        if (Storage::disk('public')->exists(path: $record->logo)) {
                            $newFilename = basename($record->logo);
                            $newPath = 'logos/' . $newFilename;

                            Storage::disk('public')->copy($record->logo, $newPath);
                            $logoPath = $newPath;
                        }
                    }

                    Umkm::create([
                        'name' => $record->name,
                        'logo' => $logoPath,
                        'category_id' => $record->category_id,
                        'province' => $record->province,
                        'city' => $record->city,
                        'address' => $record->address,
                        'latitude' => $record->latitude,
                        'longitude' => $record->longitude,
                        'phone' => $record->phone,
                        'email' => $record->email,
                        'website' => $record->website,
                        'instagram' => $record->instagram,
                        'tiktok' => $record->tiktok,
                        'facebook' => $record->facebook,
                        'description' => $record->description,
                        'registered_at' => now(),
                        'open_hour' => $record->open_hour,
                        'close_hour' => $record->close_hour,
                    ]);

                    Notification::make()
                        ->title('Berhasil')
                        ->body('Form disetujui dan data UMKM berhasil dibuat.')
                        ->success()
                        ->send();

                }),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($this->record->status === 'pending') {
            $this->record->update(['status' => 'reviewing']);
        }
        return $data;
    }

}
