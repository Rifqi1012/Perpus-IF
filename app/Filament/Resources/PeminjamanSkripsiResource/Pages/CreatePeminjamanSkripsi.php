<?php

namespace App\Filament\Resources\PeminjamanSkripsiResource\Pages;

use App\Filament\Resources\PeminjamanSkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeminjamanSkripsi extends CreateRecord
{
    protected static string $resource = PeminjamanSkripsiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
