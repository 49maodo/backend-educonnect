<?php

namespace App\Filament\Resources\Diplomas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DiplomaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('school_id')
                    ->relationship('school', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('level')
                    ->required(),
                TextInput::make('field')
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('application_deadline')
                    ->required(),
                Textarea::make('conditions')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
