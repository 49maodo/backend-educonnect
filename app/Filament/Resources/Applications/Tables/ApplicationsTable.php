<?php

namespace App\Filament\Resources\Applications\Tables;

use App\Enums\ApplicationStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('diploma.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(
                        fn ($state): ApplicationStatus|string => match ($state) {
                            ApplicationStatus::PENDING => 'gray',
                            ApplicationStatus::APPROVED => 'success',
                            ApplicationStatus::REJECTED => 'danger',
                            default => 'primary',
                        }
                    )
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'approved' => 'Approuvé',
                        'rejected' => 'Rejeté',
                    ]),
                SelectFilter::make('diploma_id')
                    ->label('Diplôme')
                    ->relationship('diploma', 'name'),
                SelectFilter::make('user_id')
                    ->label('Utilisateur')
                    ->relationship('user', 'name'),
                SelectFilter::make('School')
                    ->label('École')
                    ->relationship('diploma.school', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
