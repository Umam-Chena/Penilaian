<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Jika ada new_password, gunakan itu untuk password
        if (filled($data['new_password'] ?? null)) {
            $data['password'] = $data['new_password'];
        }
        
        // Hapus field-field yang tidak perlu disimpan
        unset($data['new_password'], $data['new_password_confirmation']);
        
        return $data;
    }
}
