<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Coba cari user berdasarkan email
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $data['users_id'] = $user->id;
        } else {
            $data['users_id'] = auth()->id();
        }

        // Ambil user berdasarkan ID yang sudah ditentukan
        $userById = User::find($data['users_id']);

        // Isi field nama dari relasi user
        if ($userById) {
            $data['nama'] = $userById->name;
        }

        return $data;
    }
}
