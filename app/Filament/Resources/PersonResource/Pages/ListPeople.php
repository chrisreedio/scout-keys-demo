<?php

namespace App\Filament\Resources\PersonResource\Pages;

use App\Filament\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeople extends ListRecords
{
    protected static string $resource = PersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('reindex')
                ->label('Reindex')
                ->icon('heroicon-o-arrow-path')
                ->action(function () {
                    self::$resource::getModel()::flushSearchIndex();
                }),
            Actions\CreateAction::make(),
        ];
    }
}
