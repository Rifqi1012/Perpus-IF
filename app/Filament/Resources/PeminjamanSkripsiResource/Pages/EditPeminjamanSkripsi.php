<?php

namespace App\Filament\Resources\PeminjamanSkripsiResource\Pages;

use App\Filament\Resources\PeminjamanSkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeminjamanSkripsi extends EditRecord
{
    protected static string $resource = PeminjamanSkripsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
