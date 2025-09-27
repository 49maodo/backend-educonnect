<?php

namespace App\Filament\Resources\Applications\Schemas;

use App\Enums\ApplicationStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->disabled()
                    ->required(),
                Select::make('diploma_id')
                    ->relationship('diploma', 'name')
                    ->disabled()
                    ->required(),
                Select::make('status')
                    ->options(ApplicationStatus::class)
                    ->default('pending'),
                Textarea::make('student_notes')
                    ->disabled()
                    ->columnSpanFull(),
                Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }
}
