<?php

namespace App\Filament\Resources\TableReservations\Pages;

use App\Filament\Resources\TableReservations\TableReservationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTableReservation extends EditRecord
{
    protected static string $resource = TableReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
