<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = \App\Models\User::where('email', $data['email'])->first();

        if ($user) {
            $data['users_id'] = $user->id;
        } else {
            $data['users_id'] = auth()->id();
        }

        return $data;
    }
}
