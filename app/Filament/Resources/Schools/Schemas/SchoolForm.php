<?php

namespace App\Filament\Resources\Schools\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SchoolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('website')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('accreditations')
                    ->required(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                TextInput::make('application_fee_amount')
                    ->required()
                    ->numeric(),
            ]);
    }
}
