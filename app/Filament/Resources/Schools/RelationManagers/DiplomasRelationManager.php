<?php

namespace App\Filament\Resources\Schools\RelationManagers;

use App\Filament\Resources\Diplomas\DiplomaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class DiplomasRelationManager extends RelationManager
{
    protected static string $relationship = 'diplomas';

    protected static ?string $relatedResource = DiplomaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
