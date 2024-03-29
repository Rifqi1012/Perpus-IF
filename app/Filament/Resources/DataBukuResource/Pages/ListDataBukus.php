<?php

namespace App\Filament\Resources\DataBukuResource\Pages;

use App\Filament\Resources\DataBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataBuku extends ListRecords
{
    protected static string $resource = DataBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
