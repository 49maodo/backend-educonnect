<?php

namespace App\Filament\Resources\Diplomas;

use App\Filament\Resources\Diplomas\Pages\CreateDiploma;
use App\Filament\Resources\Diplomas\Pages\EditDiploma;
use App\Filament\Resources\Diplomas\Pages\ListDiplomas;
use App\Filament\Resources\Diplomas\Schemas\DiplomaForm;
use App\Filament\Resources\Diplomas\Tables\DiplomasTable;
use App\Models\Diploma;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DiplomaResource extends Resource
{
    protected static ?string $model = Diploma::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DiplomaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DiplomasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDiplomas::route('/'),
//            'create' => CreateDiploma::route('/create'),
//            'edit' => EditDiploma::route('/{record}/edit'),
        ];
    }
}
