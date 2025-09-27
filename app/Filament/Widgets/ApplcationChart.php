<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use Filament\Widgets\ChartWidget;

class ApplcationChart extends ChartWidget
{
    protected static ?int $sort = 6;
    protected ?string $heading = 'Répartition des candidatures par statut';

    protected function getData(): array
    {
        $applications = Application::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status'); // clé = status, valeur = count

        return [
            'datasets' => [
                [
                    'label' => 'Applications',
                    'data' => $applications->values(), // les nombres
                    'backgroundColor' => [
                        '#3B82F6', // bleu
                        '#10B981', // vert
                        '#F59E0B', // orange
                        '#EF4444', // rouge
                        '#8B5CF6', // violet
                    ],
                ],
            ],
            'labels' => $applications->keys(), // les statuts
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // ou 'pie'
    }
}
