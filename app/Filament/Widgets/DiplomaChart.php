<?php

namespace App\Filament\Widgets;

use App\Models\Diploma;
use Filament\Widgets\ChartWidget;

class DiplomaChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected ?string $heading = 'Répartition des diplômes par niveau';

    protected function getData(): array
    {
        // Récupérer les counts par level
        $diplomas = Diploma::query()
            ->selectRaw('level, COUNT(*) as total')
            ->groupBy('level')
            ->pluck('total', 'level'); // clé = level, valeur = total

        return [
            'datasets' => [
                [
                    'label' => 'Diplômes',
                    'data' => $diplomas->values(), // les valeurs
                    'backgroundColor' => [
                        '#3B82F6', // bleu
                        '#10B981', // vert
                        '#F59E0B', // orange
                        '#EF4444', // rouge
                        '#8B5CF6', // violet
                    ],
                ],
            ],
            'labels' => $diplomas->keys(), // les niveaux
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // ou 'pie'
    }
}
