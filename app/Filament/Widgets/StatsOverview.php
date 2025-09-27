<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        return [
            Stat::make('Utilisateurs', \App\Models\User::count())
                ->description('Nombre total d\'utilisateurs')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart(\App\Models\User::selectRaw('COUNT(*) as count')->groupByRaw('DATE(created_at)')->pluck('count')->toArray())
                ->color('success'),
            Stat::make('Écoles', \App\Models\School::count())
                ->description('Nombre total d\'écoles')
                ->descriptionIcon('heroicon-m-building-library')
                ->chart(\App\Models\School::selectRaw('COUNT(*) as count')->groupByRaw('DATE(created_at)')->pluck('count')->toArray())
                ->color('primary'),
            Stat::make('Diplômes', \App\Models\Diploma::count())
                ->description('Nombre total de diplômes')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->chart(\App\Models\Diploma::selectRaw('COUNT(*) as count')->groupByRaw('DATE(created_at)')->pluck('count')->toArray())
                ->color('info'),
            Stat::make('Candidatures', \App\Models\Application::count())
                ->description('Nombre candidatures')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart(\App\Models\Application::selectRaw('COUNT(*) as count')->groupByRaw('DATE(created_at)')->pluck('count')->toArray())
                ->color('warning'),
        ];
    }
}
