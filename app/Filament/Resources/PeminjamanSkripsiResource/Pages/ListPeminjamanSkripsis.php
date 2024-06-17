<?php

namespace App\Filament\Resources\PeminjamanSkripsiResource\Pages;

use App\Filament\Resources\PeminjamanSkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeminjamanSkripsis extends ListRecords
{
    protected static string $resource = PeminjamanSkripsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
