<?php

namespace App\Filament\Resources\Diplomas\Pages;

use App\Filament\Resources\Diplomas\DiplomaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDiploma extends CreateRecord
{
    protected static string $resource = DiplomaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
